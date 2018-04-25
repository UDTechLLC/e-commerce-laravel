<?php

Route::group([
    'prefix' => 'posts',
    'as'     => '.posts',
], function () {
    Route::get('/', [
        'uses' => 'PostController@index',
    ]);
    Route::get('/create', [
        'as'   => '.create',
        'uses' => 'PostController@create',
    ]);
    Route::post('/store', [
        'as'   => '.store',
        'uses' => 'PostController@store',
    ]);
    Route::get('{post}', [
        'as' => '.show',
        'uses' => 'PostController@show'
    ]);
});
