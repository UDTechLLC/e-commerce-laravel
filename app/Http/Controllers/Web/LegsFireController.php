<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LegsFireController extends Controller
{
    /**
     * Get legs on fire page first week.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function legsFirst()
    {
        return view('web.legs.legs_first');
    }
    /**
     * Get legs on fire page week 2.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function legsSecond()
    {
        return view('web.legs.legs_second');
    }
    /**
     * Get legs on fire page week 3.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function legsThird()
    {
        return view('web.legs.legs_third');
    }

    /**
 * Get legs on fire page week 4.
 *
 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
 */

    public function legsFourth()
    {
        return view('web.legs.legs_fourth');
    }
    /**
     * Get legs on fire page week 5.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function legsFifth()
    {
        return view('web.legs.legs_fifth');
    }
    /**
     * Get total body challenge page step 1 to 10.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function totalChallenge()
    {
        return view('web.legs.total_challenge');
    }
    /**
     * Get total body challenge page step 11 to 20.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function challengeSecond()
    {
        return view('web.legs.total_challenge_second');
    }
    /**
     * Get total body challenge page step 21 to 30.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function challengeThird()
    {
        return view('web.legs.total_challenge_third');
    }

}
