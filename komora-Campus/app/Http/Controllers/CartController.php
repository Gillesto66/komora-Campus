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
        $user ='guest';
        // $user = Auth::id() ?? 'guest';

        Log::info('Produit ajouté au panier', ['user_id' => $user, 'product_id' => $product->id]);

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
            Log::warning('Paiement Kkiapay échoué', $request->all());
            return redirect()->route('cart.view')->with('error', 'Paiement échoué.');
        }

        $cart = session('cart', []);
        if (empty($cart)) {
            Log::info('Panier vide post-paiement');
            return redirect()->route('home');
        }

        $total = collect($cart)->sum(fn($i) => $i['price'] * ($i['quantity'] ?? 1));
        $customerEmail = session('customer_email');
        $customerName = session('customer_name', 'Client Anonyme');

        if (!$customerEmail) {
            Log::error('Email manquant post-paiement');
            return redirect()->route('cart.view')->with('error', 'Erreur commande.');
        }

        $userId = Auth::check() ? Auth::id() : null;

        // Création order
        $order = Order::create([
            'user_id' => $userId,
            'total_amount' => $total,
            'status' => 'paid',
            'payment_provider' => 'kkiapay',
            'transaction_id' => $transactionId,
            'customer_email' => $customerEmail,
            'customer_name' => $customerName,
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'price' => $item['price'],
            ]);

            if ($userId) { // Si auth → permissions permanentes
                Permission::updateOrCreate(
                    ['user_id' => $userId, 'product_id' => $item['id']],
                    ['expires_at' => null]
                );
            }
        }

        session()->forget(['cart', 'customer_email', 'customer_name']);

        Log::info('Commande créée', [
            'order_id' => $order->id,
            'user_id' => $userId,
            'email' => $customerEmail,
        ]);

        if ($userId) {
            return redirect()->route('download.index')->with('success', 'Paiement OK !');
        }

        // Mode guest : Génère token 24h
        $token = Str::uuid();
        $order->update([
            'token' => $token,
            'token_expires_at' => now()->addDay(),
        ]);

        Log::info('Token guest généré', ['order_id' => $order->id, 'token' => $token]);

        return redirect()->route('download.guest', ['token' => $token]);
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