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

class DownloadController extends Controller
{
    // Page de téléchargement après achat
    public function index()
    {
        $downloads = Auth::user()->products()->withPivot('expires_at')->get();

        return view('download.index', compact('downloads'));
    }

    // Génère un lien signé temporaire (valide 1h)
    public function generateSignedUrl(Product $product)
    {
        $this->authorizeDownload($product);

        $url = URL::temporarySignedRoute(
            'download.file',
            now()->addHour(),
            ['product' => $product->id, 'token' => Str::random(32)]
        );

        return redirect($url);
    }

    // Téléchargement réel avec vérification
    public function download(Request $request, Product $product)
    {
        if (!$request->hasValidSignature()) {
            abort(403, 'Lien expiré ou invalide.');
        }

        $this->authorizeDownload($product);

        Log::info('Téléchargement autorisé', [
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'ip' => $request->ip()
        ]);

        $path = storage_path('app/public/' . $product->file_path);

        return response()->download($path, $this->generateSecureFilename($product));
    }

    private function authorizeDownload(Product $product)
    {
        if (!Auth::check()) {
            abort(403, 'Connexion requise.');
        }

        $hasAccess = Permission::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->exists();

        if (!$hasAccess && !Auth::user()->is_subscribed) {
            abort(403, 'Accès refusé. Produit non acheté.');
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