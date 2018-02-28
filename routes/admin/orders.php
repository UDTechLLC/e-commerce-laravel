<?php
Route::group([
    'prefix' => 'orders',
    'as'     => '.orders'
], function () {
    Route::get('/', [
        'uses' => 'OrderController@index'
    ]);
    Route::get('/{order}', [
        'as'   => '.edit',
        'uses' => 'OrderController@edit'
    ]);
    Route::patch('/update/{order}', [
        'as'   => '.update',
        'uses' => 'OrderController@updateStatus'
    ]);
});
