<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use setasign\Fpdi\Fpdi;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['matiere.niveau.filiere'])->latest()->paginate(20);
        $matieres = Matiere::with('niveau.filiere')->get();
        return view('admin.product', compact('products', 'matieres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:matiere,semestre',
            'matiere_id' => 'required_if:type,matiere|exists:matieres,id',
            'period' => 'required|string',
            'is_corrected' => 'boolean',
            'price_cfa' => 'required|numeric|min:0',
            'price_euro' => 'nullable|numeric',
            'description' => 'required|string',
            'file' => 'required|mimes:pdf|max:51200',
            'preview' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $filePath = $request->file('file')->store('products', 'public');
        $previewPath = $request->hasFile('preview') ? $request->file('preview')->store('previews', 'public') : null;

        $fullPath = storage_path('app/public/' . $filePath);
        $pagesCount = $this->countPdfPages($fullPath);
        $fileSizeKb = round(filesize($fullPath) / 1024);

        $product = Product::create([
            'title' => $request->title,
            'type' => $request->type,
            'matiere_id' => $request->type === 'matiere' ? $request->matiere_id : null,
            'period' => $request->period,
            'is_corrected' => $request->boolean('is_corrected'),
            'price_cfa' => $request->price_cfa,
            'price_euro' => $request->price_euro,
            'description' => $request->description,
            'file_path' => $filePath,
            'preview_path' => $previewPath,
            'pages_count' => $pagesCount,
            'file_size_kb' => $fileSizeKb,
            'nombre_pages' => $pagesCount, // Ajout pour alignement
            'poids' => $fileSizeKb, // Ajout pour alignement
        ]);

        Log::info('Produit créé', ['id' => $product->id, 'pages' => $pagesCount, 'poids' => $fileSizeKb]);

        return redirect()->route('admin.products.index')->with('success', 'Produit ajouté !');
    }

    private function countPdfPages($filePath)
    {
        try {
            $pdf = new Fpdi();
            return $pdf->setSourceFile($filePath);
        } catch (\Exception $e) {
            Log::warning('Erreur comptage pages PDF', ['file' => $filePath, 'error' => $e->getMessage()]);
            return null;
        }
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'period' => 'required|string',
            'price_cfa' => 'required|numeric',
            'description' => 'required|string',
            'file' => 'sometimes|mimes:pdf|max:51200',
            'preview' => 'sometimes|image|max:2048',
        ]);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($product->file_path);
            $data['file_path'] = $request->file('file')->store('products', 'public');
            $fullPath = storage_path('app/public/' . $data['file_path']);
            $pagesCount = $this->countPdfPages($fullPath);
            $fileSizeKb = round(filesize($fullPath) / 1024);
            $data['pages_count'] = $pagesCount;
            $data['file_size_kb'] = $fileSizeKb;
            $data['nombre_pages'] = $pagesCount; // Ajout pour alignement
            $data['poids'] = $fileSizeKb; // Ajout pour alignement
            Log::info('Fichier mis à jour', ['id' => $product->id, 'pages' => $pagesCount, 'poids' => $fileSizeKb]);
        }

        if ($request->hasFile('preview')) {
            Storage::disk('public')->delete($product->preview_path);
            $data['preview_path'] = $request->file('preview')->store('previews', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produit mis à jour');
    }

    public function destroy(Product $product)
    {
        Storage::disk('public')->delete([$product->file_path, $product->preview_path]);
        $product->delete();
        Log::info('Produit supprimé', ['id' => $product->id]);
        return back()->with('success', 'Produit supprimé');
    }
}