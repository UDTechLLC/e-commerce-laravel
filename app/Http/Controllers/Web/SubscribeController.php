<?php

namespace App\Http\Controllers\Web;

use \Newsletter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subscribe\SubscribeRequest;

class SubscribeController extends Controller
{
    const SHEDFAT_LIST = 'shedfat';

    public function addToFooterForm(SubscribeRequest $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');

        $response = Newsletter::subscribeOrUpdate($email, ['FNAME' => $name], self::SHEDFAT_LIST);

        return back();
    }
}
