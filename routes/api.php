<?php

use Illuminate\Http\Request;

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
    'as'     => '.carts',
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
            'as'   => 'remove',
            'uses' => 'Api\CartController@removeAll',
        ]);
    });
});

Route::group([
    'as'     => '.countries',
    'prefix' => 'countries',
], function () {
    Route::get('/', [
        'as'   => '.index',
        'uses' => 'Api\CountryController@index',
    ]);
});

Route::group([
    'as' => '.checkout',
    'prefix' => 'checkout',
], function () {
    Route::post('billing', [
        'as' => '.billing',
        'uses' => 'Api\CheckoutController@billing',
    ]);
    Route::post('shipping/{order}', [
        'as' => '.shipping',
        'uses' => 'Api\CheckoutController@shipping'
    ]);
    Route::post('pay/{order}', [
        'as' => '.pay',
        'uses' => 'Api\CheckoutController@pay'
    ]);
    Route::get('pay/success/{order}', [
        'as' => '.pay.success',
        'uses' => 'Api\CheckoutController@returnUrl',
    ]);
    Route::get('pay/cancel/{order}', [
        'as' => '.pay.cancel',
        'uses' => 'Api\CheckoutController@cancelUrl',
    ]);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
