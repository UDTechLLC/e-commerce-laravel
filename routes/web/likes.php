<?php

Route::group([
    'as' => '.likes',
    'prefix' => 'likes',
], function () {
    Route::post('like/{post}', [
        'as' => '.like',
        'uses' => 'Web\LikeController@like',
    ]);
    Route::put('dislike/{post}', [
        'as' => '.dislike',
        'uses' => 'Web\LikeController@dislike',
    ]);
});
