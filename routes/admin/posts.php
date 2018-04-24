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
});
