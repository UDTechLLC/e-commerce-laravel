<?php

Route::group([
    'as'     => '.category',
    'prefix' => 'category',
], function () {
    Route::get('/', [
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
});
