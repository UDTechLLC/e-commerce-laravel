<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'namespace' => 'Api'
], function () {
    Route::group([
        'as'     => 'carts',
        'prefix' => 'carts',
    ], function () {
        Route::group([
            'as'     => '.products',
            'prefix' => 'products',
        ], function () {
            Route::get('/', [
                'as'   => '.list',
                'uses' => 'CartController@index',
            ]);
            Route::post('add/{product}', [
                'as'   => '.store',
                'uses' => 'CartController@store',
            ]);
            Route::delete('remove/{product}', [
                'as'   => '.remove',
                'uses' => 'CartController@remove',
            ]);
            Route::delete('remove/{product}/all', [
                'as'   => '.remove',
                'uses' => 'CartController@removeAll',
            ]);
            Route::put('update/{product}/subscribe/period', [
                'as'   => '.update.subscribe.period',
                'uses' => 'CartController@updateSubscriptionPeriod',
            ]);
        });

        Route::group([
            'as'     => '.coupons',
            'prefix' => 'coupons',
        ], function () {
            Route::post('/', [
                'as'   => '.add',
                'uses' => 'CartController@addCoupon',
            ]);
            Route::delete('remove', [
                'as'   => '.remove',
                'uses' => 'CartController@removeCoupon',
            ]);
        });
    });

    Route::group([
        'as'     => 'countries',
        'prefix' => 'countries',
    ], function () {
        Route::get('/', [
            'as'   => '.index',
            'uses' => 'CountryController@index',
        ]);
    });

    Route::group([
        'as'     => 'checkout',
        'prefix' => 'checkout',
    ], function () {
        Route::post('shipping/{order}/{orderShipping?}', [
            'as'   => '.shipping',
            'uses' => 'CheckoutController@shipping',
        ]);
        Route::get('getUpSaleProducts/{order}', [
            'as'   => 'getUpSaleProducts',
            'uses' => 'CheckoutController@getUpSaleProduct'
        ]);
        Route::post('addUpSaleProducts/{order}', [
            'as'   => 'addUpSaleProducts',
            'uses' => 'CheckoutController@addUpSaleProduct'
        ]);
    });

    Route::group([
        'as'     => 'pay',
        'prefix' => 'pay',
    ], function () {
        Route::get('braintree/token', [
            'uses' => 'PayController@getBraintreeToken',
        ]);
        Route::post('braintree/{order}', [
            'uses' => 'PayController@pay'
        ]);
        Route::get('{order}', [
            'as'   => '.payment',
            'uses' => 'PayController@pay',
        ]);
    });

    Route::group([
        'as'     => 'webhooks',
        'prefix' => 'webhooks',
    ], function () {
        Route::group([
            'as'     => '.braintree',
            'prefix' => 'braintree',
        ], function () {
            Route::post('successfully', [
                'uses' => 'WebhookController@handleSubscriptionChargedSuccessfully',
            ]);
            Route::post('active', [
                'uses' => 'WebhookController@handleSubscriptionWentActive',
            ]);
            Route::post('canceled', [
                'uses' => 'WebhookController@handleSubscriptionCustomCanceled'
            ]);
            Route::post('expired', [
                'uses' => 'WebhookController@handleSubscriptionCustomExpired'
            ]);
            Route::post('due', [
                'uses' => 'WebhookController@handleSubscriptionPastDue',
            ]);
            Route::post('pending', [
                'uses' => 'WebhookController@handleSubscriptionPending',
            ]);
        });
    });
});
