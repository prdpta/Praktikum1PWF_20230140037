<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Halaman Utama (Welcome)
Route::get('/', function () {
    return view('welcome');
});

// Dashboard Utama
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Halaman About Me (Data Diri)
Route::get('/about', function () {
    return view('about');
})->middleware(['auth'])->name('about');

// Route Group untuk Fitur Product (Wajib Login)
Route::middleware('auth')->group(function () {
    // Tampil semua produk
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    
    // Form tambah produk
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    
    // Proses simpan produk baru
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    
    // Detail satu produk
    Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
    
    // Form edit produk
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    
    // Proses update produk (Method PUT)
    Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');
    
    // Proses hapus produk (Method DELETE)
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.delete');
});

// Route bawaan Laravel Breeze untuk Profile User
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Memanggil file auth.php (Login, Register, Logout otomatis)
require __DIR__.'/auth.php';