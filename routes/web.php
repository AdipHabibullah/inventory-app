<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
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