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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Admin'], function () {
    Route::get('/admin', [
        'as'   => 'admin_panel',
        'uses' => 'HomeController@index'
    ]);

    Route::get('/products', [
        'as' => '.products',
        'uses' => 'ProductController@index'
    ]);

    Route::get('/admin/getProducts', [
        'as' => '.getProducts',
        'uses' => 'ProductController@getProducts'
    ]);
});
