<?php

namespace App\Providers;

use App\Models\{
    Order,
    Post,
    Product
};
use App\Observers\OrderObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Braintree_Configuration::environment(config('services.braintree.environment'));
        \Braintree_Configuration::merchantId(config('services.braintree.merchant_id'));
        \Braintree_Configuration::publicKey(config('services.braintree.public_key'));
        \Braintree_Configuration::privateKey(config('services.braintree.private_key'));

        \Schema::defaultStringLength(191);

        Order::observe(OrderObserver::class);

        Route::bind('product', function ($value) {
            if ($this->isAdmin()) {
                return Product::where('slug', $value)->first();
            }
            return Product::where('slug', $value)
                ->where('published', true)
                ->first();
        });

        Route::bind('post', function ($value) {
            if ($this->isAdmin()) {
                return Post::where('slug', $value)->first();
            }
            return Post::where('slug', $value)
                ->published()
                ->first();
        });
    }

    /**
     * @return bool
     */
    private function isAdmin()
    {
        return Auth::user() && Auth::user()->hasRole('administrator');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
