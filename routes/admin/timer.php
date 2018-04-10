<?php

Route::group([
    'as' => '.timer',
    'prefix' => 'timer'
], function () {
    Route::get('/edit', [
        'as' => '.edit',
        'uses' => 'TimerController@edit'
    ]);

    Route::put('update/{timer}', [
        'as' => '.update',
        'uses' => 'TimerController@update'
    ]);
});
