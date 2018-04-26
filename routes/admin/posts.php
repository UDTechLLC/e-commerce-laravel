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
        'as'   => '.show',
        'uses' => 'PostController@show'
    ]);
    Route::get('edit/{post}', [
        'as'   => '.edit',
        'uses' => 'PostController@edit'
    ]);
    Route::post('update', [
        'as'   => '.update',
        'uses' => 'PostController@update'
    ]);
    Route::get('delete/{post}', [
        'as'   => '.delete',
        'uses' => 'PostController@destroy'
    ]);
});
