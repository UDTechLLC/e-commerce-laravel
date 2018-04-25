<?php

Route::group([
    'as'     => '.banners',
    'prefix' => 'banners',
], function () {
    Route::get('create', [
        'as'   => '.create',
        'uses' => 'BannerController@create',
    ]);
    Route::post('store', [
        'as'   => '.store',
        'uses' => 'BannerController@store',
    ]);
    Route::get('all', [
        'as' => '.all',
        'uses' => 'BannerController@all'
    ]);
});
