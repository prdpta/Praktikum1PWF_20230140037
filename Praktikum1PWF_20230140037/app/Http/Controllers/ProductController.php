<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() 
    {
        $products = Product::with('user')->get();
        return view('product.index', compact('products'));
    }

    // FUNGSI INI WAJIB ADA AGAR TOMBOL MATA BISA JALAN
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function create() 
    {
        $users = User::all();
        return view('product.create', compact('users'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:500',
            'user_id' => 'required|exists:users,id',
        ]);

        Product::create($request->all());
        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambah!');
    }

    public function edit(Product $product) 
    {
        $users = User::all();
        return view('product.edit', compact('product', 'users'));
    }

    public function update(Request $request, Product $product) 
    {
        $product->update($request->all());
        return redirect()->route('product.index')->with('success', 'Produk diperbarui!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Produk dihapus!');
    }
}