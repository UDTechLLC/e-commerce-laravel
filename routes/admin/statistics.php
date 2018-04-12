<?php

Route::group([
    'prefix' => 'statistics',
    'as'     => '.statistics'
], function () {
    Route::get('/', [
        'uses' => 'StatisticsController@index'
    ]);
    Route::get('orders/sum/period/fixed', [
        'as' => '.orders.sum.period.fixed',
        'uses' => 'StatisticsController@totalSumFixedPeriod',
    ]);
    Route::get('products/total/period/fixed', [
        'as' => '.products.total.period.fixed',
        'uses' => 'ProductStatisticController@allProductsStatisticFixedPeriod'
    ]);
});
