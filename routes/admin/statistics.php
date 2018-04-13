<?php

Route::group([
    'prefix' => 'statistics',
    'as'     => '.statistics'
], function () {
    Route::get('/', [
        'uses' => 'OrderStatisticsController@index'
    ]);
    Route::get('orders/sum/period/fixed', [
        'as' => '.orders.sum.period.fixed',
        'uses' => 'OrderStatisticsController@totalSumFixedPeriod',
    ]);
    Route::get('products/total/period/fixed', [
        'as' => '.products.total.period.fixed',
        'uses' => 'ProductStatisticController@allProductsStatisticFixedPeriod'
    ]);
    Route::get('products/specific/period/fixed', [
        'as' => '.products.specific.period.fixed',
        'uses' => 'ProductStatisticController@productStatisticFixedPeriod'
    ]);
});
