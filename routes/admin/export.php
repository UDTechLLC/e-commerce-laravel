<?php

Route::group([
    'as' => '.export',
    'prefix' => 'export',
], function () {
    Route::get('billings', [
        'as' => '.billings',
        'uses' => 'ExportController@exportBilling',
    ]);
});
