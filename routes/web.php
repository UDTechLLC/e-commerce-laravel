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
Route::get('/checkout', function () {
    return view('checkout_thank_you');
});

require_once 'web/shop.php';
require_once 'admin/admin.php';
require_once 'web/paypal.php';
require_once 'web/page.php';
require_once 'web/subscribe.php';

Auth::routes();

Route::group([
    'as' => 'auth',
    'prefix' => 'api/auth',
], function () {
    Route::post('login', [
        'as' => '.login',
        'uses' => 'Api\Auth\LoginController@login',
    ]);
});

Route::get('/test', function () {
    return view('test');
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
