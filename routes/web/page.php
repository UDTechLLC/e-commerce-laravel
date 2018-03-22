<?php
/**
 * Created by PhpStorm.
 * User: juliya
 * Date: 02.03.18
 * Time: 11:11
 */

Route::get('about-us', [
    'as'   => 'about-us',
    'uses' => 'Web\StaticController@aboutUs',
]);
Route::get('return-policy', [
    'as'   => 'return-policy',
    'uses' => 'Web\StaticController@returnPolicy',
]);
Route::get('privacy-policy', [
    'as'   => 'privacy-policy',
    'uses' => 'Web\StaticController@privacyPolicy',
]);
Route::get('weight-loss-disclaimer', [
    'as'   => 'weight-loss-disclaimer',
    'uses' => 'Web\StaticController@weightLossDisclaimer',
]);
Route::get('faq', [
    'as'   => 'faq',
    'uses' => 'Web\StaticController@faq',
]);
