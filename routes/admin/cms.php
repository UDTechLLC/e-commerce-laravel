<?php

Route::group([
    'as'        => '.cms',
    'prefix'    => 'cms',
    'namespace' => 'CMS'
], function () {
    Route::get('homepage', [
        'uses' => 'HomePageController@index'
    ]);
});
