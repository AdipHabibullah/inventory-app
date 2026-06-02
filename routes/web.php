<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/insert', [ProductController::class, 'insert']);
Route::get('/update', [ProductController::class, 'update']);
Route::get('/delete', [ProductController::class, 'delete']);

Route::get('/create', [ProductController::class, 'create']);
Route::post('/create', [ProductController::class, 'store']);

Route::get('/update-products/{id}',  [ProductController::class, 'edit']);
Route::put('/update-products/{id}',  [ProductController::class, 'update_product']);

Route::delete('/products/{id}', [ProductController::class, 'destroy']);

Route::fallback(function () {
    return '404 Halaman Tidak Ada';
});

// Route::resource otomatis akan membuat 7 rute CRUD standar (index, create, 
// store, show, edit, update, destroy) ke dalam aplikasi.
Route::resource('categories', CategoryController::class);

Route::get('/hello', function () {
    return view('hello');
});
