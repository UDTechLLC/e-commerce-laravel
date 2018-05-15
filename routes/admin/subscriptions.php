<?php

Route::group([
    'as'     => '.subscriptions',
    'prefix' => 'subscriptions',
], function () {
    Route::get('/', [
        'uses' => 'SubscriptionController@index',
    ]);

    Route::get('getSubscriptions', [
        'as'   => '.getSubscriptions',
        'uses' => 'SubscriptionController@getSubscriptions',
    ]);

    Route::group([
        'as'     => '.custom',
        'prefix' => 'custom',
    ], function () {
        Route::get('/', [
            'as'   => '.index',
            'uses' => 'CustomSubscriptionController@index',
        ]);
        Route::get('getSubscriptions', [
            'as'   => '.getSubscriptions',
            'uses' => 'CustomSubscriptionController@getSubscriptions',
        ]);
    });
});
