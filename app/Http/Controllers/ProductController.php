<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('products.index', compact('products')); 
    }

    public function insert()
    {
        $product = new Product();
        $product->category_id = 1;
        $product->name = 'sapu';
        $product->price = 150000;
        $product->stock = 1;
        $product->description = 'Sapu lidi';
        $product->status = 'habis';
        $product->save();

        dd($product);
    }

    public function update()
    {
        $product = Product::findOrFail(44);
        $product->name = 'Laptop';
        $product->price = 1200000;
        $product->stock = 5;
        $product->description = 'Acer';
        $product->status = 'tersedia';
        $product->save();

        dd($product);
    }

    public function delete()
    {
        $product = Product::findOrFail(45);
        $product->delete();

        dd('Produk telah dihapus');
    }
}