<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // You can bind services or register packages here if needed.
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       
        Paginator::useBootstrapFive();
    }
}
