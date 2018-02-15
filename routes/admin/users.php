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
});
