<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require 'web/shop.php';
require 'admin/admin.php';
require 'web/paypal.php';
require 'web/page.php';
require 'web/subscribe.php';

Auth::routes();

Route::group([
    'as'     => 'auth',
    'prefix' => 'api/auth',
], function () {
    Route::post('login', [
        'as'   => '.login',
        'uses' => 'Api\Auth\LoginController@login',
    ]);
});

Route::group([
    'as'     => 'checkout',
    'prefix' => 'checkout',
], function () {
    Route::post('billing/{cart}/{orderBilling?}', [
        'as'   => '.billing',
        'uses' => 'Api\CheckoutController@billing',
    ]);
    Route::post('shipping/{order}/{orderShipping?}', [
        'as'   => '.shipping',
        'uses' => 'Api\CheckoutController@shipping',
    ]);
});
Route::get('test', function () {
    return view('errors.error_payment');
});