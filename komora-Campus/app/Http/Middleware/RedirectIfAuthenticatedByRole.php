<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedByRole
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        foreach (['admin', 'affilier', 'user'] as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect($this->redirectPath(Auth::guard($guard)->user()));
            }
        }

        return $next($request);
    }

    protected function redirectPath($user)
    {
        return match ($user->role) {
            'admin'    => '/dashboard/admin',
            'affilier' => '/dashboard/affilier',
            default    => '/dashboard',
        };
    }
}