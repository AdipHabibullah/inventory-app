<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// ─── Route Publik ───────────────────────────────────────────────────────────
Route::get('/', function () {
    return view('home');
});

// ─── Route Autentikasi ──────────────────────────────────────────────────────
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ─── Route Terproteksi (Hanya Pengguna Login) ──────────────────────────────
Route::middleware(['auth.manual'])->group(function () {
    
    // Route yang dapat diakses oleh semua pengguna yang sudah login
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

    // Route yang hanya dapat diakses oleh admin
    Route::middleware(['role:admin'])->group(function () {
        
        // CRUD Produk (khusus admin)
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

        // CRUD Kategori (khusus admin)
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });
});

// Old routes (commented out, diganti dengan route baru di atas)
// Route::get('/insert', [ProductController::class, 'insert']);
// Route::get('/update', [ProductController::class, 'update']);
// Route::get('/delete', [ProductController::class, 'delete']);
// Route::get('/create', [ProductController::class, 'create']);
// Route::post('/create', [ProductController::class, 'store']);
// Route::get('/update-products/{id}',  [ProductController::class, 'edit']);
// Route::put('/update-products/{id}',  [ProductController::class, 'update_product']);
// Route::delete('/products/{id}', [ProductController::class, 'destroy']);
// Route::resource('categories', CategoryController::class);

Route::get('/hello', function () {
    return view('hello');
});

Route::fallback(function () {
    return '404 Halaman Tidak Ada';
});
