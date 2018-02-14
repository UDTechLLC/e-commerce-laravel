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
        'uses' => 'ProductController@index'
    ]);
    Route::get('products/{product}', [
        'uses' => 'ProductController@show'
    ]);

//    require_once 'products.php';
});
