<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use setasign\Fpdi\Fpdi; // Pour compter les pages PDF

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['matiere.niveau.filiere'])->latest()->paginate(20);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $matieres = Matiere::with('niveau.filiere')->get();
        return view('admin.products.create', compact('matieres'));
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
            'file' => 'required|mimes:pdf|max:51200', // 50 Mo max
            'preview' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $filePath = $request->file('file')->store('products', 'public');
        $previewPath = $request->hasFile('preview')
            ? $request->file('preview')->store('previews', 'public')
            : null;

        // Compter les pages + taille
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
        ]);

        Log::info('Produit créé par admin', ['product_id' => $product->id, 'pages' => $pagesCount, 'size_kb' => $fileSizeKb]);

        return redirect()->route('admin.products.index')->with('success', 'Produit ajouté !');
    }

    // Méthode magique pour compter les pages PDF
    private function countPdfPages($filePath)
    {
        try {
            $pdf = new Fpdi();
            $pageCount = $pdf->setSourceFile($filePath);
            return $pageCount;
        } catch (\Exception $e) {
            Log::warning('Impossible de compter les pages PDF', ['file' => $filePath, 'error' => $e->getMessage()]);
            return null;
        }
    }

    // Edit / Update / Destroy (simplifiés)
    public function edit(Product $product)
    {
        $matieres = Matiere::with('niveau.filiere')->get();
        return view('admin.products.edit', compact('product', 'matieres'));
    }

    public function update(Request $request, Product $product)
    {
        // Même validation que store, mais file et preview en "sometimes"
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
            $data['pages_count'] = $this->countPdfPages($fullPath);
            $data['file_size_kb'] = round(filesize($fullPath) / 1024);
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
        return back()->with('success', 'Produit supprimé');
    }
}