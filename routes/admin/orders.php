<?php
Route::group([
    'prefix' => 'orders',
    'as'     => '.orders'
], function () {
    Route::get('/', [
        'uses' => 'OrderController@index'
    ]);
});
