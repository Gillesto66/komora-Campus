<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Niveau;
use App\Models\Matiere;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Page d'accueil : 3 filières populaires + 4 derniers produits
     */
    public function index()
    {
        // 3 filières au choix (les plus populaires ou manuellement choisies)
        $featuredFilieres = Filiere::withCount('niveaux.matieres.products')
            ->orderBy('products_count', 'desc')
            ->limit(3)
            ->get(['id', 'name', 'emblem']);

        // 4 derniers produits ajoutés (toutes catégories)
        $latestProducts = Product::with(['matiere.niveau.filiere'])
            ->where('type', 'matiere') // seulement les produits "matière", pas les packs
            ->latest()
            ->limit(4)
            ->get(['id', 'title', 'price_cfa', 'period', 'is_corrected', 'preview_path']);

        Log::info('Accueil chargée', [
            'featured_filieres' => $featuredFilieres->pluck('name'),
            'latest_products_count' => $latestProducts->count()
        ]);

        return view('welcome', compact('featuredFilieres', 'latestProducts'));
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
public function showFilter()
{
    $filieres = Filiere::select('id', 'name')->get();

    Log::info('Catalogue affiché', ['filieres_count' => $filieres->count()]);

    return view('catalogue', compact('filieres'));
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
                    'price' => $product->price_euro ?? $product->price_cfa / 655.957 . '€', // Conversion approx si euro null
                    'preview_url' => $product->preview_path,
                    'url' => route('product.show', $product->id)
                ];
            }),
            'pagination' => $products->links()->toHtml() // Pour updater pagination
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