<?php

Route::group([
    'as'     => '.categories',
    'prefix' => 'categories',
], function () {
    Route::get('', [
        'uses' => 'CategoryController@index'
    ]);
    Route::get('create', [
        'as'   => '.create',
        'uses' => 'CategoryController@create',
    ]);
    Route::post('store', [
        'as'   => '.store',
        'uses' => 'CategoryController@store',
    ]);
    Route::get('delete/{category}', [
        'as'   => '.delete',
        'uses' => 'CategoryController@destroy'
    ]);
});
