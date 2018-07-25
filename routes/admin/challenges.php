<?php

Route::group([
    'prefix' => 'challenges',
    'as'     => '.challenges',
], function () {
    Route::get('/', [
        'uses' => 'ChallengeController@index',
    ]);
    Route::get('edit/{challenge}', [
        'as'   => '.edit',
        'uses' => 'ChallengeController@edit'
    ]);
    Route::post('update/{challenge}', [
        'as'   => '.update',
        'uses' => 'ChallengeController@update'
    ]);
});
