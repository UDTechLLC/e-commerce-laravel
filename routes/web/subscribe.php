<?php

declare(strict_types = 1);

Route::group([
    'as'     => 'subscribe',
    'prefix' => 'subscribe',
], function () {
    Route::post('footer', [
        'as'   => '.footer',
        'uses' => 'Web\SubscribeController@addToFooterForm',
    ]);
    Route::post('challenge', [
        'as'   => '.challenge',
        'uses' => 'Web\SubscribeController@addToChallengeList',
    ]);
    Route::post('dadhat', [
        'as'   => '.dadhat',
        'uses' => 'Web\SubscribeController@addToShedfatDadHatList',
    ]);
});
