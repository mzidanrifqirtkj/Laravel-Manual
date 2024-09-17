<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }

    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {

            if($guard === 'admin'){
                return redirect()->route('admin.home');
            }
            return redirect()->route('user.home');
            // return redirect(RouteServiceProvider::HOME);
        }
    }
if (! $request->expectsJson()) {
        if($request->routeIs('admin.*')){
            return route('admin.login');
        }
        return route('login');
    }
}

foreach ($guards as $guard) {
    if (Auth::guard($guard)->check()) {

        if($guard === 'admin'){
            return redirect()->route('admin.home');
        }
        return redirect()->route('user.home');
        // return redirect(RouteServiceProvider::HOME);
    }
