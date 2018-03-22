<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaticController extends Controller
{
    /**
     * Get about us static page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function aboutUs()
    {
        return view('web.page.about_us');
    }

    /**
     * Get return policy static page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function returnPolicy()
    {
        return view('web.page.return_policy');
    }

    /**
     * Get privacy policy static page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function privacyPolicy()
    {
        return view('web.page.privacy_policy');
    }

    /**
     * Get weight loss disclaimer static page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function weightLossDisclaimer()
    {
        return view('web.page.weight_loss_disclaimer');
    }

    /**
     * Return faq static page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function faq()
    {
        return view('web.page.faq');
    }
}
