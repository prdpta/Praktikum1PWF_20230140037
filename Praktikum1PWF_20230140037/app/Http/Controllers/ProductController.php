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

    // FUNGSI INI YANG MEMBUAT TOMBOL MATA BISA LIHAT DETAIL
    public function show(Product $product)
{
    // Mengarahkan ke file resources/views/product/show.blade.php
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
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'name.min' => 'Nama produk minimal harus 3 karakter.',
            'quantity.required' => 'Jumlah kuantitas wajib diisi.',
            'quantity.integer' => 'Kuantitas harus berupa angka bulat.',
            'price.required' => 'Harga produk wajib diisi.',
            'price.numeric' => 'Harga harus berupa angka yang valid.',
            'user_id.required' => 'Owner wajib dipilih.',
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
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:500',
            'user_id' => 'required|exists:users,id',
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'quantity.required' => 'Jumlah wajib diisi.',
            'price.required' => 'Harga wajib diisi.',
            'user_id.required' => 'Owner wajib dipilih.',
        ]);

        $product->update($request->all());
        return redirect()->route('product.index')->with('success', 'Produk diperbarui!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Produk dihapus!');
    }
}