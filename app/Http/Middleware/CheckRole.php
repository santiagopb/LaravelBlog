<?php

namespace Cronti\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {

        if ($request->user()->hasAnyRole($roles) || !$roles){
          return $next($request);
        }
        return response ('Permisos insuficientes (middleware - CheckRole)', 401);
    }
}
