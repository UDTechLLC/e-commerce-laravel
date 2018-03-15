<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\Subscribe\ChallengeSubscribeRequest;
use \Newsletter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subscribe\FooterSubscribeRequest;

class SubscribeController extends Controller
{
    const SHEDFAT_LIST = 'footer_list';
    const CHALLENGE_LIST = 'challenge_list';

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

        $response = Newsletter::subscribeOrUpdate($email, [], self::SHEDFAT_LIST);

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

        Newsletter::subscribeOrUpdate($email, ['FNAME' => $name], self::CHALLENGE_LIST);

        return back();
    }
}
