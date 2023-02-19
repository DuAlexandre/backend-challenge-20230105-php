<?php

namespace App\Providers;

use App\Models\Product;
use App\Repositories\ProductRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(abstract: 'App\Repositories\ProductRepositoryInterface', concrete: 'App\Repositories\ProductRepositoryEloquent');

        $this->app->bind(abstract: 'App\Repositories\ProductRepositoryInterface', concrete: function(){
            return new ProductRepositoryEloquent(new Product());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
