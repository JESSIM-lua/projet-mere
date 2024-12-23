<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PasswordAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Si l'utilisateur est authentifié, on continue
        if (session('authenticated')) {
            return $next($request);
        }

        // Vérifie si on est sur la page de connexion
        if ($request->is('login') || $request->is('login/*')) {
            return $next($request);
        }

        // Vérifie le mot de passe lors d'une soumission de formulaire
        if ($request->isMethod('post') && $request->input('password') === env('APP_PASSWORD')) {
            session(['authenticated' => true]);
            return redirect()->intended('/');
        }

        // Redirige vers la page de connexion si aucune condition n'est remplie
        return redirect('/login');
    }
}
