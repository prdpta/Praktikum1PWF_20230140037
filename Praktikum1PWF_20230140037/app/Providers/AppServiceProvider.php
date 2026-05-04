<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Mendefinisikan Gate 'admin' untuk mengecek role di database
        Gate::define('admin', function (User $user) {
            return $user->role === 'admin';
        });

        \Dedoc\Scramble\Scramble::configure()
            ->routes(function (\Illuminate\Routing\Route $route) {
                return \Illuminate\Support\Str::startsWith($route->uri, 'api/');
            });

        Gate::define('viewApiDocs', function () {
            return true;
        });
    }
}