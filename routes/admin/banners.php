<?php

Route::group([
    'as'     => '.banners',
    'prefix' => 'banners',
], function () {
    Route::get('create', [
        'as'   => '.create',
        'uses' => 'BannerController@create',
    ]);
});
