<?php

namespace App\Http\Controllers\Api;

use Braintree\WebhookNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;

/**
 * Class WebhookController.
 * @package App\Http\Controllers\Api
 */
class WebhookController extends CashierController
{
    /**
     * @param Request $request
     */
    public function handleSubscriptionChargedSuccessfully(Request $request)
    {
        $notification = WebhookNotification::parse($request->bt_signature, $request->bt_payload);
    }

    public function handleSubscriptionWentActive(Request $request)
    {
        $notification = WebhookNotification::parse($request->bt_signature, $request->bt_payload);
    }
}
