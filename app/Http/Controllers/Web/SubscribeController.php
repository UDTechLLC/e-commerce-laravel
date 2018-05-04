<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\Subscribe\ChallengeSubscribeRequest;
use \Newsletter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subscribe\FooterSubscribeRequest;

class SubscribeController extends Controller
{
    const NEWSLETTER_SUBSCRIPTION = 'Newsletter Subscription';
    const SHED_FAT_30_DAY_CHALLENGE = 'ShedFat 30 Day Challenge';
    const DAD_HAT = 'Dad hat';

    /**
     * Add email to footer_list.
     *
     * @param FooterSubscribeRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToFooterForm(FooterSubscribeRequest $request)
    {
        $email = $request->get('email');

        $response = Newsletter::subscribeOrUpdate($email, [], self::NEWSLETTER_SUBSCRIPTION);

        return back();
    }

    /**
     * Add email to subscribe list.
     *
     * @param ChallengeSubscribeRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToChallengeList(ChallengeSubscribeRequest $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');

        Newsletter::subscribeOrUpdate($email, ['FNAME' => $name], self::SHED_FAT_30_DAY_CHALLENGE);

        return back();
    }

    /**
     * Add email to subscribe list.
     *
     * @param ChallengeSubscribeRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToShedfatDadHatList(ChallengeSubscribeRequest $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');

        Newsletter::subscribeOrUpdate($email, ['FNAME' => $name], self::DAD_HAT);

        return back();
    }
}
