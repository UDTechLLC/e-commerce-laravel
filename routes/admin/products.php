<?php


Route::group([
    'prefix' => 'products',
    'as' => '.products'
], function () {
    Route::get('/', [
        'uses' => 'ProductController@index'
    ]);

    Route::get('/list', [
        'as' => '.list',
        'uses' => 'ProductController@getProducts'
    ]);

    Route::get('/create', [
        'as' => '.create',
        'uses' => 'ProductController@create'
    ]);
    
    Route::delete('/delete/{product}', [
        'as' => '.delete',
        'uses' => 'ProductController@destroy'
    ]);
});
