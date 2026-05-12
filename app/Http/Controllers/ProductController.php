<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
            'status'      => 'required|in:tersedia,habis',
            'description' => 'nullable|string',
        ]);

        Product::create($validated);

        return redirect('/create')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $product    = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update_product(Request $request, $id)
    {
        $product  = Product::findOrFail($id);
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
            'status'      => 'required|in:tersedia,habis',
            'description' => 'nullable|string',
        ]);

        $product->update($validated);

        return redirect('/products')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('success', 'Produk berhasil dihapus!');
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
