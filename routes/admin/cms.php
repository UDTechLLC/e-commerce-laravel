<?php

Route::group([
    'as'        => '.cms',
    'prefix'    => 'cms',
    'namespace' => 'CMS'
], function () {
    Route::group([
        'prefix' => 'homepage',
        'as'     => '.homepage'
    ], function () {
        Route::get('/', [
            'uses' => 'HomePageController@index'
        ]);
        Route::get('edit/{CMSHomePage}', [
            'as' => '.edit',
            'uses' => 'HomePageController@edit'
        ]);
        Route::put('update/{CMSHomePage}', [
            'as' => '.update',
            'uses' => 'HomePageController@update'
        ]);
    });
});
