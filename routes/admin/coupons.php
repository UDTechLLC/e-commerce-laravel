<?php
Route::group([
    'prefix' => 'coupons',
    'as'     => '.coupons'
], function () {
    Route::get('/', [
        'uses' => 'CouponController@index'
    ]);

    Route::get('/list', [
        'as'   => '.list',
        'uses' => 'CouponController@getCoupons'
    ]);

    Route::get('/create', [
        'as'   => '.create',
        'uses' => 'CouponController@create'
    ]);

    Route::post('/store', [
        'as'   => '.store',
        'uses' => 'CouponController@store'
    ]);

//    Route::get('/edit/{coupon}', [
//        'as'   => '.edit',
//        'uses' => 'CouponController@edit'
//    ]);


//    Route::delete('/delete/{coupon}', [
//        'as'   => '.delete',
//        'uses' => 'CouponController@destroy'
//    ]);
});