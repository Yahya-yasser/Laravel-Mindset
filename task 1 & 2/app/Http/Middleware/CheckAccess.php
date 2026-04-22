<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAccess
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        
        if ($request->query('access') === 'teacher') {
            return $next($request); 
        }

        abort(403, 'Forbidden - Access denied'); 
    }
}