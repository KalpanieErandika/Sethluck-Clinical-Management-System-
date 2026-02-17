<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $sessionExpired = now()->diffInHours($request->session()->get('last_active')) >= 6;
            if ($sessionExpired) {
                Auth::logout();
                return redirect()->route('login');
            }
            $request->session()->put('last_active', now());
        } else {
            return redirect()->route('home');

        }
        return $next($request);
    }
}
