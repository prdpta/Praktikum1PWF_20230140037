<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Category; // Wajib diimport
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() 
    {
        // Menambahkan with('category') agar nama kategori bisa muncul di tabel jika perlu
        $products = Product::with(['user', 'category'])->get();
        return view('product.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function create() 
    {
        $users = User::all();
        $categories = Category::all(); // Ambil data kategori untuk dropdown
        return view('product.create', compact('users', 'categories'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:500',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:category,id', // Validasi kategori
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'quantity.required' => 'Jumlah kuantitas wajib diisi.',
            'price.required' => 'Harga produk wajib diisi.',
            'user_id.required' => 'Owner wajib dipilih.',
            'category_id.required' => 'Kategori wajib dipilih.',
        ]);

        Product::create($request->all());
        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambah!');
    }

    public function edit(Product $product) 
    {
        $users = User::all();
        $categories = Category::all(); // Ambil data kategori untuk dropdown
        return view('product.edit', compact('product', 'users', 'categories'));
    }

    public function update(Request $request, Product $product) 
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:500',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:category,id', // Validasi kategori
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'user_id.required' => 'Owner wajib dipilih.',
            'category_id.required' => 'Kategori wajib dipilih.',
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