<?php

Route::group([
    'as'     => '.filters',
    'prefix' => 'filters',
], function () {
    Route::get('/', [
        'as'   => '.filter',
        'uses' => 'OrderController@filter',
    ]);
});
