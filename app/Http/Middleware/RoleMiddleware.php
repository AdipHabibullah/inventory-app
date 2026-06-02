<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * @param string|array $roles Peran yang diizinkan (bisa lebih dari satu)
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Pastikan pengguna sudah login terlebih dahulu
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        // Periksa apakah role pengguna ada dalam daftar role yang diizinkan
        if (!in_array($userRole, $roles)) {
            // Tampilkan halaman 403 Forbidden
            abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
