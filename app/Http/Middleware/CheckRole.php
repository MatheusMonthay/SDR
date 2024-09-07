<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // Verifica se o usuário está autenticado
        if (!Auth::check()) {
            // Redireciona para a página de login se o usuário não estiver autenticado
            return redirect()->route('login');
        }

        // Verifica se o usuário tem o papel correto
        if (Auth::user()->role !== $role) {
            // Retorna uma resposta de "403 - Proibido" caso o papel não corresponda
            abort(403, 'Acesso negado.');
        }

        return $next($request);
    }
}