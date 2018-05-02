<?php

Route::group([
    'as' => '.likes',
    'prefix' => 'likes',
], function () {
    Route::put('like/{post}', [
        'as' => '.like',
        'uses' => 'Web\LikeController@like',
    ]);
    Route::put('dislike/{post}', [
        'as' => '.dislike',
        'uses' => 'Web\LikeController@dislike',
    ]);
});
