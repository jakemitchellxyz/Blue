<?php

namespace MeestorHok\Blue\Http\Middleware;

use Closure;
use MeestorHok\Blue\Site;

class SiteDoesntExistMiddleware
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
        if (Site::all()->count() > 0) {
            return redirect()->to('admin/dashboard');
        }
        
        return $next($request);
    }
}
