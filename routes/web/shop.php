<?php
/**
 * Created by PhpStorm.
 * User: juliya
 * Date: 12.02.18
 * Time: 11:12
 */

Route::group([
    'namespace' => 'Web',
], function () {
    Route::get('/', [
        'as' => 'home',
        'uses' => 'HomeController@index'
    ]);
    Route::get('shop', [
        'as' => 'shop',
        'uses' => 'ProductController@index'
    ]);

    Route::get('product/{product}', [
        'as'   => 'products.show',
        'uses' => 'ProductController@show'
    ]);
    Route::get('challenge', [
        'as'   => 'challenge',
        'uses' => 'ProductController@challenge'
    ]);
    Route::get('contact', [
        'as' => 'contact',
        'uses' => 'ContactController@index'
    ]);
    Route::post('contact','ContactController@sendContactToEmail');

//   require_once 'products.php';

    Route::group([
        'prefix' => 'cart',
        'as'     => 'cart'
    ], function () {

        Route::get('/', [
            'uses' => 'CartController@index'
        ]);

        Route::get('/getProducts', [
            'as'   => '.getProduct',
            'uses' => 'CartController@getProduct'
        ]);
    });

    Route::get('/checkout', [
        'as'   => 'checkout',
        'uses' => 'CheckoutController@index'
    ]);
});
