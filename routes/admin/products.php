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

    Route::get('/edit/{product}', [
        'as'   => '.edit',
        'uses' => 'ProductController@edit'
    ]);

    Route::put('/update/{product}', [
        'as'   => '.update',
        'uses' => 'ProductController@update'
    ]);

    Route::delete('/delete/{product}', [
        'as'   => '.delete',
        'uses' => 'ProductController@destroy'
    ]);

    Route::get('/order', [
        'as' => '.order',
        'uses' => 'ProductController@order'
    ]);

    Route::post('/order', [
        'as' => '.orderSave',
        'uses' => 'ProductController@orderSave'
    ]);
});
