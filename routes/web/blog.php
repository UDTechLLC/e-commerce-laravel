<?php

Route::group([
    'as'        => '.blog',
    'prefix'    => 'blog',
    'namespace' => 'Web'
], function () {
    Route::get('/', [
        'uses' => 'BlogController@index'
    ]);
    Route::get('/all', [
        'as'   => '.all',
        'uses' => 'BlogController@all'
    ]);
    Route::get('/{post}', [
        'as'   => '.show',
        'uses' => 'BlogController@show'
    ]);
});
