<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        $categories = Category::withCount('products')->get();
        return view('category.index', compact('categories'));
    }

    // Menampilkan form tambah kategori
    public function create()
    {
        return view('category.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:category,name',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    // Menampilkan form edit kategori
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    // Memproses perubahan data kategori
    public function update(Request $request, Category $category)
    {
        // Validasi agar nama unik kecuali untuk kategori yang sedang diupdate
        $request->validate([
            'name' => 'required|unique:category,name,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    // Menghapus kategori
    public function destroy(Category $category)
    {
        // Cek apakah kategori masih memiliki produk agar tidak error database
        if ($category->products()->count() > 0) {
            return back()->with('error', 'Cannot delete category that still has products.');
        }

        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}