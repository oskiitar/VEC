<?php

/**
 * @description Middleware de ADMIN VEC
 * @author Oscar Rodriguez Sedes
 * @version 1.0
 * @date 23.11.2020
 */

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isAdmin()){

            return $next($request);
        }

        return redirect('/')->with('error', __('Unauthorized'));
    }
}
