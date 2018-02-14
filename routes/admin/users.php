<?php
Route::group([
    'prefix' => 'users',
    'as'     => '.users'
], function () {
    Route::get('/', [
        'uses' => 'UserController@index'
    ]);
});
