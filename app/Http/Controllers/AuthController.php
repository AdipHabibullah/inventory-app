<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman form login.
     */
    public function showLoginForm()
    {
        // Jika pengguna sudah login, arahkan langsung ke halaman produk
        if (Auth::check()) {
            return redirect()->route('products.index');
        }
        return view('auth.login');
    }

    /**
     * Memproses data login yang dikirimkan dari form.
     */
    public function login(Request $request)
    {
        // Validasi input dari pengguna
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 6 karakter.',
        ]);

        // Ambil kredensial yang dikirimkan
        $credentials = $request->only('email', 'password');

        // Auth::attempt() mencocokkan kredensial dengan database
        // Jika cocok, sesi login akan dibuat secara otomatis
        if (Auth::attempt($credentials)) {
            // Regenerasi session ID untuk mencegah session fixation attack
            $request->session()->regenerate();

            return redirect()->intended(route('products.index'))
                ->with('success', 'Selamat datang, ' . Auth::user()->name . '!');
        }

        // Jika gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan tidak valid.',
        ])->onlyInput('email');
    }

    /**
     * Memproses permintaan logout dari pengguna.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Hapus semua data sesi untuk keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('info', 'Anda telah berhasil keluar dari sistem.');
    }
}
