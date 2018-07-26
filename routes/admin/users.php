<?php
Route::group([
    'prefix' => 'users',
    'as'     => '.users'
], function () {
    Route::get('/', [
        'uses' => 'UserController@index'
    ]);
    Route::get('/list', [
        'as'   => '.list',
        'uses' => 'UserController@getUsers'
    ]);
    Route::get('/create', [
        'as'   => '.create',
        'uses' => 'UserController@create'
    ]);
    Route::post('/store', [
        'as'   => 'store',
        'uses' => 'UserController@store'
    ]);
    Route::get('/edit/{user}', [
        'as'   => '.edit',
        'uses' => 'UserController@edit'
    ]);
    Route::post('/update/{user}', [
        'as'   => '.update',
        'uses' => 'UserController@update'
    ]);
    Route::delete('/delete/{user}', [
        'as'   => '.delete',
        'uses' => 'UserController@destroy'
    ]);
});
