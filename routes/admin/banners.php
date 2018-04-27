<?php

Route::group([
    'as'     => '.banners',
    'prefix' => 'banners',
], function () {
    Route::get('/', [
       'uses' => 'BannerController@index'
    ]);
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
    Route::get('template/{banner}', [
        'as' => '.banner.template',
        'uses' => 'BannerController@getTemplate',
    ]);
});
