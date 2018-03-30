<?php

Route::group([
    'prefix' => 'statistics',
    'as'     => 'statistics'
], function () {
    Route::get('/', [
        'uses' => 'StatisticsController@index'
    ]);
});
