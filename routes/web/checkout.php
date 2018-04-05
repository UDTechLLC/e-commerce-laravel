<?php

Route::group([
    'as'     => 'checkout',
    'prefix' => 'checkout',
], function () {
    Route::post('billing/{cart}/{orderBilling?}', [
        'as'   => '.billing',
        'uses' => 'Api\CheckoutController@billing',
    ]);
    Route::post('shipping/{order}/{orderShipping?}', [
        'as'   => '.shipping',
        'uses' => 'Api\CheckoutController@shipping',
    ]);
});
