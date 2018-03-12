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
//Route::get('test', function () {
//    $order = \App\Models\Order::find(1);
//    return view('email.product',compact('order') );
//});
require_once 'web/shop.php';
require_once 'admin/admin.php';
require_once 'web/paypal.php';
require_once 'web/page.php';

Auth::routes();
