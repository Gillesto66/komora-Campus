<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => ['required', Rule::in(['user', 'affilier', 'admin'])],
            'phone' => 'nullable|string|max:20',
        ]);

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

        // Tentative sur chaque garde
        foreach (['admin', 'affilier', 'user'] as $guard) {
            if (Auth::guard($guard)->attempt($credentials, $request->filled('remember'))) {
                $request->session()->regenerate();
                Log::info('Connexion réussie', ['guard' => $guard, 'user_id' => Auth::guard($guard)->id()]);

                return redirect()->intended($this->redirectTo(Auth::guard($guard)->user()));
            }
        }

        Log::warning('Échec de connexion', ['email' => $request->email]);

        return back()->withErrors(['email' => 'Identifiants incorrects.'])->onlyInput('email');
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
        return match ($user->role) {
            'admin'     => route('dashboard.admin'),
            'affilier'  => route('dashboard.affilier'),
            default     => route('dashboard.user'),
        };
    }

    // Dashboards (vues simples et créatives)
    public function showAdmin()
    {
        return view('dashboard.admin', ['user' => Auth::guard('admin')->user()]);
    }

    public function showUser()
    {
        return view('dashboard.user', ['user' => Auth::guard('user')->user()]);
    }

    public function showAffilier()
    {
        return view('dashboard.affilier', ['user' => Auth::guard('affilier')->user()]);
    }
}