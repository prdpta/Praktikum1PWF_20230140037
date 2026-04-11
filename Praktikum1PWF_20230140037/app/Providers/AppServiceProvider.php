<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate; // Wajib ada
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    public function register(): void { }

    public function boot(): void {
        // Definisikan Gate untuk Admin
        Gate::define('manage-product', function (User $user) {
            return $user->role === 'admin';
        });
    }
}