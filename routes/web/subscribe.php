<?php

declare(strict_types = 1);

Route::group([
    'as' => 'subscribe',
    'prefix' => 'subscribe',
], function () {
    Route::post('footer', [
        'as' => '.footer',
        'uses' => 'Web\SubscribeController@addToFooterForm',
    ]);
});
