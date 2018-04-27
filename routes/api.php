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
    'as'     => 'carts',
    'prefix' => 'carts',
], function () {
    Route::group([
        'as'     => '.products',
        'prefix' => 'products',
    ], function () {
        Route::get('/', [
            'as'   => '.list',
            'uses' => 'Api\CartController@index',
        ]);
        Route::post('add/{product}', [
            'as'   => '.store',
            'uses' => 'Api\CartController@store',
        ]);
        Route::delete('remove/{product}', [
            'as'   => '.remove',
            'uses' => 'Api\CartController@remove',
        ]);
        Route::delete('remove/{product}/all', [
            'as'   => '.remove',
            'uses' => 'Api\CartController@removeAll',
        ]);
    });

    Route::group([
        'as'     => '.coupons',
        'prefix' => 'coupons',
    ], function () {
        Route::post('/', [
            'as'   => '.add',
            'uses' => 'Api\CartController@addCoupon',
        ]);
        Route::delete('remove', [
            'as'   => '.remove',
            'uses' => 'Api\CartController@removeCoupon',
        ]);
    });
});

Route::group([
    'as'     => 'countries',
    'prefix' => 'countries',
], function () {
    Route::get('/', [
        'as'   => '.index',
        'uses' => 'Api\CountryController@index',
    ]);
});

Route::group([
    'as'     => 'checkout',
    'prefix' => 'checkout',
], function () {
    Route::post('shipping/{order}/{orderShipping?}', [
        'as'   => '.shipping',
        'uses' => 'Api\CheckoutController@shipping',
    ]);
});

Route::group([
    'as'     => 'pay',
    'prefix' => 'pay',
], function () {
    Route::get('braintree/token', [
        'uses' => 'Api\PayController@getBraintreeToken',
    ]);
    Route::post('braintree/{order}', [
       'uses' => 'Api\PayController@pay'
    ]);
    Route::get('{order}', [
        'as'   => '.payment',
        'uses' => 'Api\PayController@pay',
    ]);
});

Route::group([
    'as' => 'webhooks',
    'prefix' => 'webhooks',
], function () {
    Route::group([
        'as' => '.braintree',
        'prefix' => 'braintree',
    ], function () {
        Route::post('successfully', [
            'uses' => 'Api\WebhookController@handleSubscriptionChargedSuccessfully',
        ]);
        Route::post('active', [
            'uses' => 'Api\WebhookController@handleSubscriptionWentActive',
        ]);
        Route::post('canceled', [
            'uses' => 'Api\WebhookController@handleSubscriptionCustomCanceled'
        ]);
        Route::post('expired', [
            'uses' => 'Api\WebhookController@handleSubscriptionCustomExpired'
        ]);
        Route::post('due', [
            'uses' => 'Api\WebhookController@handleSubscriptionPastDue',
        ]);
        Route::post('pending', [
            'uses' => 'Api\WebhookController@handleSubscriptionPending',
        ]);
    });
});
