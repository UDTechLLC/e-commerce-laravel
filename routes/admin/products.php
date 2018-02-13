<?php


Route::group([
    'prefix' => 'products',
    'as'     => '.products'
], function () {
    Route::get('/', [
        'uses' => 'ProductController@index'
    ]);

    Route::get('/list', [
        'as'   => '.list',
        'uses' => 'ProductController@getProducts'
    ]);

    Route::get('/create', [
        'as'   => '.create',
        'uses' => 'ProductController@create'
    ]);

    Route::post('/store', [
        'as'   => '.store',
        'uses' => 'ProductController@store'
    ]);

    Route::get('/edit', [
        'as'   => '.edit',
        'uses' => 'ProductController@edit'
    ]);

    Route::put('/update', [
        'as'   => '.update',
        'uses' => 'ProductController@update'
    ]);

    Route::delete('/delete/{product}', [
        'as'   => '.delete',
        'uses' => 'ProductController@destroy'
    ]);
});
