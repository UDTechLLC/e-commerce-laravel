<?php

namespace App\Http\Controllers\Web;

use \Newsletter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subscribe\SubscribeRequest;

class SubscribeController extends Controller
{
    public function addMail(/**MailChimpRequest $request*/)
    {
//        $response = Newsletter::subscribe('polik.palam@gmail.com', [], 'shedfat');
//        $isSubscribed = Newsletter::isSubscribed('polik.palam@gmail.com', 'shedfat');

        $api = Newsletter::getApi();
    }
}
