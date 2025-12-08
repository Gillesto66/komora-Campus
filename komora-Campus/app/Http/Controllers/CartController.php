<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function add(Request $request, Product $product)
    {
        $cart = session('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'title' => $product->title,
                'price' => $product->price_euro ?? round($product->price_cfa / 655.957, 2),
                'preview' => $product->preview_path ? asset('storage/' . $product->preview_path) : null,
                'quantity' => 1,
            ];
        }

        session(['cart' => $cart]);

        Log::info('Produit ajouté au panier', ['user_id' => Auth::id(), 'product_id' => $product->id]);

        return redirect()->route('cart.view')->with('success', 'Ajouté au panier !');
    }

    public function view()
    {
        $cart = session('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $itemCount = collect($cart)->sum('quantity');

        // Pour Kkiapay
        $kkiapayPublicKey = config('services.kkiapay.public_key');
        $kkiapaySecretKey = config('services.kkiapay.secret_key');
        $kkiapaySandbox = config('services.kkiapay.sandbox', true);

        return view('panier', compact('cart', 'total', 'itemCount', 'kkiapayPublicKey', 'kkiapaySandbox'));
    }

    public function remove($productId)
    {
        $cart = session('cart', []);
        unset($cart[$productId]);
        session(['cart' => $cart]);

        return back()->with('success', 'Produit retiré');
    }

    public function kkiapayCallback(Request $request)
    {
        $transactionId = $request->input('transaction_id');

        if (!$transactionId || $request->input('status') !== 'SUCCESS') {
            Log::warning('Paiement Kkiapay échoué ou invalide', $request->all());
            return redirect()->route('cart.view')->with('error', 'Paiement échoué ou annulé.');
        }

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('home');
        }

        $total = collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']);

        // Récupération des infos client depuis la session (ajoutées dans le panier)
        $customerEmail = session('customer_email');
        $customerName  = session('customer_name', 'Client KOMORA');

        if (!$customerEmail) {
            Log::error('Email client manquant lors du callback Kkiapay');
            return redirect()->route('cart.view')->with('error', 'Erreur de traitement de la commande.');
        }

        // Création ou récupération de l'utilisateur
        $user = \App\Models\User::firstOrCreate(
            ['email' => $customerEmail],
            [
                'name' => $customerName,
                'password' => bcrypt(Str::random(16)), // mot de passe temporaire
                'role' => 'user',
            ]
        );

        // Connexion automatique
        Auth::login($user);

        // Création de la commande
        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => $total,
            'status' => 'paid',
            'payment_provider' => 'kkiapay',
            'transaction_id' => $transactionId,
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'price' => $item['price'],
                'quantity' => $item['quantity'] ?? 1,
            ]);

            Permission::updateOrCreate(
                ['user_id' => $user->id, 'product_id' => $item['id']],
                ['expires_at' => null]
            );
        }

        session()->forget(['cart', 'customer_email', 'customer_name']);

        Log::info('Commande créée avec succès pour nouveau/compte existant', [
            'order_id' => $order->id,
            'user_id' => $user->id,
            'email' => $customerEmail,
            'new_user' => $user->wasRecentlyCreated
        ]);

        // Si l'utilisateur vient de être créé → on le redirige vers la page de définition du mot de passe
        if ($user->wasRecentlyCreated) {
            return redirect()->route('download')->with('must_set_password', true);
        }

        return redirect()->route('download')->with('success', 'Paiement réussi ! Vos fichiers sont prêts.');
    }

    public function saveCustomer(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|max:255',
        ]);

        session([
            'customer_email' => $request->email,
            'customer_name' => $request->name,
        ]);

        Log::info('Informations client sauvegardées pour paiement', [
            'email' => $request->email,
            'name' => $request->name
        ]);

        return response()->json(['success' => true]);
    }

}