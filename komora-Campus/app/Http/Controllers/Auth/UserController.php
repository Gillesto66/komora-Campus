<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\Models\Product;
use App\Models\Filiere;
use App\Models\Niveau;
use App\Models\Matiere;

class UserController extends Controller
{
    // Register

    public function showAuth()
    {
        $a = 15;
        if (Auth::guard('admin')->check() &&  $a == 14) {
            log::info('Utilisateur déjà connecté en tant qu\'admin');
            return redirect()->route('dashboard.admin'); // ou redirectTo() selon le rôle
        }

        return view('auth');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => ['required', Rule::in(['user', 'affilier', 'admin'])],
            'phone' => 'nullable|string|max:20',
        ]);

        if ($request->role !== 'user') {
            Log::warning('Tentative d\'inscription non autorisée', ['email' => $request->email, 'role' => $request->role]);
            return back()->withErrors(['role' => 'Inscription non autorisée pour ce rôle.'])->onlyInput('role');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'phone' => $request->phone,
        ]);

        Log::info('Nouvel utilisateur inscrit', ['id' => $user->id, 'role' => $user->role]);

        return redirect()->route('login')->with('success', 'Inscription réussie !');
    }

    // Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // On tente uniquement avec le guard principal (user)
        if (Auth::guard('user')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::guard('user')->user();

            Log::info('Connexion réussie', [
                'guard' => 'user',
                'user_id' => $user->id,
                'role' => $user->role
            ]);

            // Redirection selon le rôle
            return redirect()->intended($this->redirectTo($user));
        }

        Log::warning('Échec de connexion', ['email' => $request->email]);

        return back()
            ->withErrors(['email' => 'Identifiants incorrects.'])
            ->onlyInput('email');
    }

    // Logout
    public function logout(Request $request)
    {
        $guard = null;
        foreach (['admin', 'affilier', 'user'] as $g) {
            if (Auth::guard($g)->check()) {
                $guard = $g;
                break;
            }
        }

        if ($guard) {
            Log::info('Déconnexion', ['guard' => $guard, 'user_id' => Auth::guard($guard)->id()]);
            Auth::guard($guard)->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Redirection dashboard selon rôle
    protected function redirectTo($user)
    {
        return $user->getRedirectRoute();
    }

    // Dashboards (vues simples et créatives)
    public function showAdmin()
    {
        $stats = [
            'products_count' => Product::count(),
            'filieres_count' => Filiere::count(),
            'niveaux_count' => Niveau::count(),
            'matieres_count' => Matiere::count(),
            'users_count' => User::count(), // Exemple stats users
            // Ajouter d'autres stats si besoin, e.g. orders: Order::count()
        ];

        Log::info('Dashboard admin affiché', ['user_id' => Auth::id(), 'stats' => $stats]);

        return view('dashboard.admin', compact('stats'));
    }

    public function showUser()
    {
        $user = Auth::user();

        $purchasedProducts = $user->products()
            ->select('products.id', 'products.title', 'products.price_cfa', 'products.file_path')
            ->withPivot('created_at as purchased_at')
            ->orderByDesc('permissions.created_at')
            ->get();

        Log::info('Dashboard utilisateur chargé', [
            'user_id' => $user->id,
            'achats_count' => $purchasedProducts->count()
        ]);

        return view('dashboard.user', compact('user', 'purchasedProducts'));
    }

    public function showAffilier()
    {
        return view('dashboard.affilier', ['user' => Auth::user()]);
    }
}