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
require 'web/checkout.php';

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

Route::get('videolibrary/legs-fire-downloads', [
    'as' => '.videolibrary',
    'uses' => 'Web\VideoLibraryController@awayToWp',
]);
