<?php

Route::group([
    'as' => '.shipping',
    'prefix' => 'shipping',
], function () {
    Route::get('', [
        'as' => '.index',
        'uses' => 'ShippingController@index'
    ]);
    Route::get('create', [
        'as' => '.create',
        'uses' => 'ShippingController@create',
    ]);
    Route::post('store', [
        'as' => '.store',
        'uses' => 'ShippingController@store'
    ]);
    Route::get('edit/{shipping}', [
        'as' => '.edit',
        'uses' => 'ShippingController@edit'
    ]);
    Route::put('update/{shipping}', [
        'as' => '.update',
        'uses' => 'ShippingController@update'
    ]);
    Route::delete('delete/{shipping}', [
        'as' => '.delete',
        'uses' => 'ShippingController@destroy',
    ]);
});
