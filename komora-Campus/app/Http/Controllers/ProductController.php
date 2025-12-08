<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Niveau;
use App\Models\Matiere;
use Illuminate\Support\Facades\DB;
use App\Models\agc;

class ProductController extends Controller
{
    /**
     * Page d'accueil : 3 filières populaires + 4 derniers produits
     */
    public function index()
    {
        try {
            $featuredFilieres = Filiere::select('filieres.*')
            ->selectSub(
                Product::where('type', 'matiere')
                    ->join('matieres', 'products.matiere_id', '=', 'matieres.id')
                    ->join('niveaux', 'matieres.niveau_id', '=', 'niveaux.id')
                    ->whereColumn('niveaux.filiere_id', 'filieres.id')
                    ->selectRaw('count(*)'),
                'total_products'
            )
            ->orderByDesc('total_products')
            ->limit(3)
            ->get(['id', 'name', 'emblem']);

            $latestProducts = Product::with(['matiere.niveau.filiere'])
                ->where('type', 'matiere')
                ->orderBy('created_at', 'desc')
                ->take(4)
                ->get(['id', 'title', 'price_cfa', 'period', 'is_corrected', 'preview_path']);

            Log::info('Accueil chargé', [
                'featured' => $featuredFilieres->pluck('name', 'total_products')->toArray(),
                'latest_products_ids' => $latestProducts->pluck('id', 'created_at')->toArray(),
            ]);

            return view('welcome', compact('featuredFilieres', 'latestProducts'));

        } catch (\Throwable $e) {
            Log::error('Erreur accueil', [
                'msg' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);

            return view('welcome', [
                'featuredFilieres' => collect(),
                'latestProducts' => collect(),
            ]);
        }
    }

    /**
     * Recherche intelligente avec autocomplétion (API JSON)
     */
    public function search(Request $request)
    {
        $query = trim($request->input('q', ''));

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $results = Product::with(['matiere.niveau.filiere'])
            ->where('type', 'matiere')
            ->where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                  ->orWhere('period', 'LIKE', "%{$query}%")
                  ->orWhereHas('matiere', fn($m) => $m->where('name', 'LIKE', "%{$query}%"))
                  ->orWhereHas('matiere.niveau', fn($n) => $n->where('name', 'LIKE', "%{$query}%"))
                  ->orWhereHas('matiere.niveau.filiere', fn($f) => $f->where('name', 'LIKE', "%{$query}%"));
            })
            ->latest()
            ->limit(10)
            ->get(['id', 'title', 'period', 'price_cfa', 'is_corrected']);

        Log::info('Recherche effectuée', ['query' => $query, 'results' => $results->count()]);

        return response()->json(
            $results->map(fn($p) => [
                'id' => $p->id,
                'title' => $p->title,
                'subtitle' => $p->matiere?->niveau?->filiere?->name . ' • ' . $p->matiere?->name . ' • ' . $p->period,
                'price' => $p->price_cfa . ' FCFA',
                'corrected' => $p->is_corrected ? 'Avec corrigé' : 'Sujet seul',
                'url' => route('product.show', $p->id),
            ])
        );
    }

    /**
     * Affichage d'un produit (fiche détaillée)
     */
    public function show(Product $product)
    {
        $product->load([
            'matiere.niveau.filiere',
            'orderItems' => fn($q) => $q->whereHas('order', fn($o) => $o->where('status', 'paid'))
        ]);

        // Produits similaires (même matière ou même filière)
        $related = Product::where('type', 'matiere')
            ->where(function ($q) use ($product) {
                $q->where('matiere_id', $product->matiere_id)
                  ->orWhereHas('matiere.niveau.filiere', fn($f) => $f->where('id', $product->matiere?->niveau?->filiere_id));
            })
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->limit(6)
            ->get(['id', 'title', 'price_cfa', 'period', 'preview_path']);

        Log::info('Fiche produit affichée', ['product_id' => $product->id, 'title' => $product->title]);

        return view('products.show', compact('product', 'related'));
    }

    /**
 * Affiche la vue catalogue avec données initiales (chargées dynamiquement via JS)
 */

    public function showFilter(Request $request)
    {
        $filieres = Filiere::select('id', 'name')->get();

        $filiereId = $request->query('filiere');

        // Toujours un paginateur (même vide) → links() fonctionne toujours
        $products = Product::with(['matiere.niveau.filiere'])
            ->when($filiereId, function ($query) use ($filiereId) {
                return $query->whereHas('matiere.niveau.filiere', fn($q) => $q->where('id', $filiereId));
            })
            ->latest()
            ->paginate(12);

        $products->appends($request->query()); // garde ?filiere=xx dans les liens de pagination

        $searchCount = $products->total();

        Log::info('Catalogue filtré', [
            'filiere_id' => $filiereId,
            'products_count' => $searchCount,
            'page' => $products->currentPage(),
        ]);

        $product = $products; // Pour cohérence avec vue

        return view('catalogue', compact('filieres', 'products', 'searchCount'));
    }

/**
 * Filtre les produits basé sur params (cumulatifs: filière -> niveau -> matière -> semestre)
 * Retourne JSON pour AJAX
 */
    public function filter(Request $request)
    {
        $query = Product::with(['matiere.niveau.filiere'])
            ->where('type', 'matiere'); // Focus sur produits matière

        if ($filiereId = $request->query('filiere_id')) {
            $query->whereHas('matiere.niveau.filiere', function ($q) use ($filiereId) {
                $q->where('id', $filiereId);
            });
        }

        if ($niveauId = $request->query('niveau_id')) {
            $query->whereHas('matiere.niveau', function ($q) use ($niveauId) {
                $q->where('id', $niveauId);
            });
        }

        if ($matiereId = $request->query('matiere_id')) {
            $query->where('matiere_id', $matiereId);
        }

        if ($semester = $request->query('semester')) {
            $query->whereHas('matiere', function ($q) use ($semester) {
                $q->where('semester', $semester); // 'pair' ou 'impair'
            });
        }

        $products = $query->latest()->paginate(12);
        $searchCount = $products->count();

        Log::info('Filtre appliqué', [
            'params' => $request->query(),
            'results_count' => $products->count()
        ]);

        return response()->json([
            'products' => $products->items()->map(function ($product) {
                return [
                    'id' => $product->id,
                    'title' => $product->title,
                    'niveau' => $product->matiere?->niveau?->name,
                    'period' => $product->period,
                    'price' => $product->price_cfa ?? $product->price_euro *655.957, // Conversion approx si euro null
                    'preview_url' => $product->preview_path,
                    'url' => route('product.show', $product->id)
                ];
            }),
            'pagination' => $products->links()->toHtml() ,// Pour updater pagination
            'results_count' => $searchCount
        ]);
    }

    // Helpers pour chargement dynamique (API)
    public function getNiveaux($filiereId)
    {
        $niveaux = Niveau::where('filiere_id', $filiereId)->select('id', 'name')->get();

        Log::info('Niveaux chargés', ['filiere_id' => $filiereId, 'count' => $niveaux->count()]);

        return response()->json($niveaux);
    }

    public function getMatieres($niveauId)
    {
        $matieres = Matiere::where('niveau_id', $niveauId)->select('id', 'name')->get();

        Log::info('Matières chargées', ['niveau_id' => $niveauId, 'count' => $matieres->count()]);

        return response()->json($matieres);
    }
}