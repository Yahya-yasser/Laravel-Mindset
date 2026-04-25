<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ColorTest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $colors = ['red' , 'green', 'blue'];

        $color = $request->route('color');

        if(!in_array($color , $colors)){

            abort (404 , 'wrong color '); 
        }

        return $next($request);
    }
}
