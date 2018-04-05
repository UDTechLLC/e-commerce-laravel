<?php

Route::group([
    'prefix' => 'subscriptions',
    'as'     => '.subscriptions'
], function () {
    Route::get('/', [
        'uses' => 'SubscriptionController@index'
    ]);
});
