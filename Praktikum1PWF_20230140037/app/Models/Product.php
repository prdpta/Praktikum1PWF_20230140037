<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Tambahkan ini

class Product extends Model
{
    use HasFactory;

    // 'category_id' wajib ada di fillable agar bisa disimpan via mass assignment
    protected $fillable = ['name', 'quantity', 'price', 'user_id', 'category_id'];

    /**
     * Relasi: Produk dimiliki oleh seorang User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Produk termasuk dalam satu Kategori.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}