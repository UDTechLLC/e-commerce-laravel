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

    require 'products.php';
    require 'users.php';
    require 'orders.php';
    require 'coupons.php';
    require 'statistics.php';
    require 'subscriptions.php';
    require 'timer.php';
    require 'posts.php';
    require 'banners.php';
    require 'category.php';
    require 'shipping.php';
});
