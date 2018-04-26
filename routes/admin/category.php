<?php

Route::group([
    'as'     => '.category',
    'prefix' => 'category',
], function () {
    Route::get('create', [
        'as'   => '.create',
        'uses' => 'CategoryController@create',
    ]);
    Route::post('store', [
        'as'   => '.store',
        'uses' => 'CategoryController@store',
    ]);
});
