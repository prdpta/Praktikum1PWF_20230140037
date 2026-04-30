<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController; 
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

// Route Group (Semua yang butuh Login ada di sini)
Route::middleware('auth')->group(function () {
    
    // --- FITUR PRODUCT ---
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

    // --- FITUR CATEGORY ---
    // Menggunakan Resource agar mencakup: index, create, store, edit, update, dan destroy
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit'); // Tambahan Edit
    Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');   // Tambahan Update
    Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy'); // Tambahan Delete

    // --- PROFILE USER (Breeze) ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Memanggil file auth.php (Login, Register, Logout)
require __DIR__.'/auth.php';