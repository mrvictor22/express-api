<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Comprueba si el usuario actual tiene uno de los roles especificados
        if (! $request->user() || ! in_array($request->user()->role, $roles)) {
            return response()->view('error.auth-404-basic', [], 404);
        }

        return $next($request);
    }


}
