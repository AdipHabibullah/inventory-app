<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sudah login menggunakan Auth::check()
        if (!Auth::check()) {
            // Arahkan ke halaman login dengan pesan error
            return redirect()->route('login')
                ->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        // Pengguna sudah login, lanjutkan request ke controller
        return $next($request);
    }
}
