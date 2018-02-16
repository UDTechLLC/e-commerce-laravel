<?php

declare(strict_types = 1);

Route::group([
    'as'     => 'paypal',
    'prefix' => 'paypal',
], function () {
    Route::get('pay', [
        'as'   => 'pay',
        'uses' => 'Web\PayPalController@pay',
    ]);
    Route::get('return', [
        'as'   => '.return',
        'uses' => 'Web\PayPalController@returnUrl',
    ]);
    Route::get('cancel', [
        'as'   => '.cancel',
        'uses' => 'Web\PayPalController@cancelUrl',
    ]);
});
