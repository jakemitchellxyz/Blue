<?php

namespace MeestorHok\Blue\Http\Middleware;

use Closure;
use MeestorHok\Blue\User;

class AdminDoesntExistMiddleware
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
        if (User::all()->count() > 0) {
            return redirect()->to('/');
        }
        
        return $next($request);
    }
}
