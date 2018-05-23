<?php
/**
 * Created by PhpStorm.
 * User: juliya
 * Date: 23.05.18
 * Time: 10:40
 */

Route::get('legs-on-fire', [
    'as'   => 'legs-on-fire',
    'uses' => 'Web\LegsFireController@legsFirst',
]);
Route::get('legs-on-fire-week-2', [
    'as'   => 'legs-on-fire-week-2',
    'uses' => 'Web\LegsFireController@legsSecond',
]);
Route::get('legs-on-fire-week-3', [
    'as'   => 'legs-on-fire-week-3',
    'uses' => 'Web\LegsFireController@legsThird',
]);
Route::get('legs-on-fire-week-4', [
    'as'   => 'legs-on-fire-week-4',
    'uses' => 'Web\LegsFireController@legsFourth',
]);
Route::get('legs-on-fire-week-5', [
    'as'   => 'legs-on-fire-week-5',
    'uses' => 'Web\LegsFireController@legsFifth',
]);
Route::get('total-body-challenge', [
    'as'  =>'total-body-challenge',
    'uses' => 'Web\LegsFireController@totalChallenge'
]);
Route::get('total-body-challenge-11-20',[
   'as' => 'total-body-challenge-11-20',
   'uses' =>'Web\LegsFireController@challengeSecond'
]);
Route::get('total-body-challenge-21-30',[
    'as' => 'total-body-challenge-21-30',
    'uses' =>'Web\LegsFireController@challengeThird'
]);