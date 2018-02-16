<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'as'     => '.carts',
    'prefix' => 'carts',
], function () {
    Route::group([
        'as'     => '.products',
        'prefix' => 'products',
    ], function () {
        Route::get('store', [
            'as'   => '.store',
            'uses' => 'Api\CartController@store',
        ]);
    });
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
