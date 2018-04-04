<?php
Route::group([
    'prefix' => 'orders',
    'as'     => '.orders',
], function () {
    Route::get('/', [
        'uses' => 'OrderController@index',
    ]);
    Route::group([
        'as'     => '.filters',
        'prefix' => 'filters',
    ], function () {
        Route::get('/', [
            'as'   => '.filter',
            'uses' => 'OrderController@filter',
        ]);
    });
    Route::get('/list', [
        'as'   => '.list',
        'uses' => 'OrderController@getOrders',
    ]);
    Route::get('/{order}', [
        'as'   => '.edit',
        'uses' => 'OrderController@edit',
    ]);
    Route::patch('/update/{order}', [
        'as'   => '.update',
        'uses' => 'OrderController@updateStatus',
    ]);
});
