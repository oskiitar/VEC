<?php

namespace App\Http\Middleware;

use Closure;
use App\Client;

class VerifyIfClient
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
        $client = Client::find($request->user()->id);
        if ($client){
            return $next($request); 
        }

        return redirect('/');
    }
}
