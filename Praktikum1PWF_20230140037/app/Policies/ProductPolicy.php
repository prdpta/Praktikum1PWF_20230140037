<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    public function view(User $user, Product $product): bool
    {
        return true; 
    }

    public function update(User $user, Product $product): bool
    {
        return $user->role === 'admin' || $user->id === $product->user_id;
    }

    public function delete(User $user, Product $product): bool
    {
        return $user->role === 'admin' || $user->id === $product->user_id;
    }

    public function before(User $user, string $ability): bool|null
    {
        if ($user->role === 'admin') {
            return true;
        }

        return null;
    }
}