<?php

namespace App\Providers;

use App\Models\{
    Order,
    Post,
    Product
};
use App\Observers\OrderObserver;
use Carbon\Carbon;
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
            return Product::where('slug', $value)
                ->where('published', true)
                ->first();
        });

        Route::bind('post', function ($value) {
            return Post::where('slug', $value)
                ->where('published', true)
                ->where('posted_at', '<=', Carbon::now())
                ->first();
        });
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
