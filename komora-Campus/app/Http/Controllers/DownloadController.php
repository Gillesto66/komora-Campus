<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\User;

class DownloadController extends Controller
{
    // Pour auth : Liste permanente
    public function index()
    {
        if (!Auth::check()) {
            abort(403);
        }
        $downloads = Auth::user()->products()->get();
        Log::info('Accès dashboard downloads auth', ['user_id' => Auth::id()]);
        return view('download.index', compact('downloads'));
    }

    // Pour guest : Liste temporaire 24h
    public function guest(Request $request, $token)
    {
        $order = Order::where('token', $token)
            ->where('token_expires_at', '>', now())
            ->whereNull('user_id')
            ->firstOrFail();

        $downloads = $order->orderItems()->with('product')->get()->pluck('product');

        Log::info('Accès guest downloads', ['order_id' => $order->id, 'ip' => $request->ip()]);

        return view('download.index', [
            'downloads' => $downloads,
            'order' => $order,
            'is_guest' => true,
        ]);
    }

    // Set password post-achat guest
    public function setPassword(Request $request, Order $order)
    {
        if ($order->user_id || $order->token_expires_at < now()) {
            abort(403);
        }

        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'email' => $order->customer_email,
            'name' => $order->customer_name,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        $order->update(['user_id' => $user->id, 'token' => null, 'token_expires_at' => null]);

        foreach ($order->orderItems as $item) {
            Permission::create([
                'user_id' => $user->id,
                'product_id' => $item->product_id,
            ]);
        }

        Auth::login($user);

        Log::info('Compte créé post-achat', ['user_id' => $user->id, 'order_id' => $order->id]);

        return redirect()->route('download.index')->with('success', 'Compte créé !');
    }

    // Signed URL (supporte auth/guest)
    public function generateSignedUrl(Request $request, Product $product)
    {
        $token = $request->query('token');
        $this->authorizeDownload($product, $token);

        $params = ['product' => $product->id];
        if ($token) $params['token'] = $token;

        $url = URL::temporarySignedRoute(
            'download.file',
            now()->addHour(),
            $params
        );

        Log::info('Signed URL générée', $params);

        return redirect($url);
    }

    // Download réel
    public function download(Request $request, Product $product)
    {
        if (!$request->hasValidSignature()) {
            abort(403, 'Lien expiré.');
        }

        $token = $request->query('token');
        $this->authorizeDownload($product, $token);

        Log::info('Téléchargement', [
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'token' => $token,
            'ip' => $request->ip()
        ]);

        return response()->download(storage_path('app/public/' . $product->file_path), $this->generateSecureFilename($product));
    }

    private function authorizeDownload(Product $product, $token = null)
    {
        if ($token) { // Mode guest
            $order = Order::where('token', $token)
                ->where('token_expires_at', '>', now())
                ->whereNull('user_id')
                ->firstOrFail();

            if (!$order->orderItems()->where('product_id', $product->id)->exists()) {
                abort(403);
            }
            return;
        }

        if (!Auth::check() || !Permission::where('user_id', Auth::id())->where('product_id', $product->id)->exists()) {
            abort(403);
        }
    }
    // Nom de fichier sécurisé avec watermark
    private function generateSecureFilename(Product $product): string
    {
        $user = Auth::user();
        $safeName = preg_replace('/[^a-zA-Z0-9_-]/', '_', $product->title);
        return "{$safeName}_{$user->name}_{$user->email}_" . now()->format('Ymd') . ".pdf";
    }
}