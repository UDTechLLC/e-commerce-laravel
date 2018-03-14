<?php
/**
 * Created by PhpStorm.
 * User: juliya
 * Date: 02.03.18
 * Time: 11:11
 */

Route::get('about-us', function () {
    return view('web.page.about_us');
});
Route::get('return-policy', function () {
    return view('web.page.return_policy');
});
Route::get('privacy-policy', function () {
    return view('web.page.privacy_policy');
});
Route::get('weight-loss-disclaimer', function () {
    return view('web.page.weight_loss_disclaimer');
});
Route::get('faq', function () {
    return view('web.page.faq');
});

