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
    Route::get('/', [
        'prefix' =>'shop',
        'as' => 'shop',
        'uses' => 'ProductController@index'
    ]);

    Route::get('product/{product}', [
        'as' => 'products.show',
        'uses' => 'ProductController@show'
    ]);

//   require_once 'products.php';

    Route::group([
        'prefix' => 'cart',
        'as' => 'cart'
    ], function () {
        
        Route::get('/', [
           'uses' => 'CartController@index'
        ]);

        Route::get('/getProducts', [
            'as' => '.getProduct',
            'uses' => 'CartController@getProduct'
        ]);
    });
});
