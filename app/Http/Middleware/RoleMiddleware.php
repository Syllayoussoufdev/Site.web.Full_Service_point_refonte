<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Vérifie si l'utilisateur est authentifié et a le rôle requis, puis enregistrer dans bootstrap/app
        if (!in_array($request->user()->role, [$role])) {
            abort(403, 'Acées non autorisé.'); 
        
        // Redirige vers une page d'erreur 403 si l'utilisateur n'a pas le rôle requis   
        }

        return $next($request);
    }
}
