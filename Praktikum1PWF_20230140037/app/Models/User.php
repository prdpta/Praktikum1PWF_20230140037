<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany; // Tambahkan ini

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Pastikan 'role' ada di sini agar bisa diisi (Fillable)
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi: Satu User bisa punya banyak Product
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}