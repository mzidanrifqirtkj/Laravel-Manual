<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
{
    $guards = ['admin', 'user'];


    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            // Redirect jika admin mencoba akses user
            if ($guard === 'admin' && $request->routeIs('user.*')) {
                return redirect()->route('admin.dashboard');
            }

            // Redirect jika user mencoba akses admin
            if ($guard === 'user' && $request->routeIs('admin.*')) {
                return redirect()->route('user.dashboard');
            }

            return $next($request); // Izinkan akses ke rute yang sesuai
        }
    }

    // Jika tidak terautentikasi, redirect ke halaman login
    if (!$request->expectsJson()) {
        return redirect()->route('login');
    }

    return $next($request);
}
}
