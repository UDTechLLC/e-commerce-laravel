<?php

Route::group([
    'prefix' => 'posts',
    'as'     => '.posts',
], function () {
    Route::get('/', [
        'uses' => 'PostController@index',
    ]);
});
