<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetCompanyContext
{
    public function handle(Request $request, Closure $next)
    {
        // Aqui pode-se definir lógica futura para multiempresa
        // Exemplo: setar company_id na sessão ou contexto
        return $next($request);
    }
}
