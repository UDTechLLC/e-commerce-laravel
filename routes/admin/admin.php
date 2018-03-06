<?php


Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'middleware' => ['auth','role:administrator'],
    'as' => 'admin'
], function () {
    Route::get('/', [
        'uses' => 'HomeController@index'
    ]);

    require_once 'products.php';
    require_once 'users.php';
    require_once 'orders.php';
    require_once 'coupons.php';
});
