<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminIsValid
{
    public function handle(Request $request, Closure $next)
    {
        // Kalau belum login → ke login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Kalau sudah login → lanjut
        return $next($request);
    }
}