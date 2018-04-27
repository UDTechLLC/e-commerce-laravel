<?php

Route::group([
    'as'        => '.blog',
    'prefix'    => 'blog',
    'namespace' => 'Web'
], function () {
    Route::get('/', [
        'uses' => 'BlogController@index'
    ]);
});
