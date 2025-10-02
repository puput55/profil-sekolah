<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekLevel
{
    public function handle(Request $request, Closure $next, ...$level)
    {
        // Pastikan user login dulu
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login dulu.');
        }

        // Cek apakah role user sesuai dengan level yang diizinkan
        if (in_array(Auth::user()->role, $level)) {
            return $next($request);
        }

        // Kalau login tapi role tidak sesuai
        return redirect()->route('home')->with('error', 'Anda tidak punya akses ke halaman ini.');
    }
}
