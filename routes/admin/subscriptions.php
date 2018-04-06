<?php

Route::group([
    'as' => '.subscriptions',
    'prefix' => 'subscriptions'
], function () {
    Route::get('/', [
        'as' => '.index',
        'uses' => 'SubscriptionController@index'
    ]);
    
    Route::get('getSubscriptions', [
        'as' => '.getSubscriptions',
        'uses' => 'SubscriptionController@getSubscriptions'
    ]);
});
