<?php

namespace App\Providers;

use App\{Profile, Product, Cart};
use App\Repositories\{ProfileRepository, ProductRepository, CartRepository};

use Illuminate\Support\ServiceProvider;

class EloquentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
    * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		$this->app->singleton('ProfileRepository', function () {
			return new ProfileRepository(new Profile);
		});

		$this->app->singleton('ProductRepository', function () {
			return new ProductRepository(new Product);
		});

        $this->app->singleton('CartRepository', function () {
            return new CartRepository(new Cart);
        });
    }
}