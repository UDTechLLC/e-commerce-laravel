<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\BillingRequest;
use App\Http\Requests\Checkout\ShippingRequest;
use App\Models\Shipping;
use App\Models\User;
use App\Services\PayPal\PayPalService;
use App\Transformers\Api\UserTransformer;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /** @var PayPalService */
    protected $service;

    public function __construct()
    {
        $this->service = new PayPalService();
    }

    /**
     * Add billing information.
     *
     * @param BillingRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function billing(BillingRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt(str_random());

        $user = User::create($data);

        return fractal($user, new UserTransformer())->respond();
    }

    /**
     * Add shipping information.
     *
     * @param ShippingRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function shipping(ShippingRequest $request)
    {
        Shipping::create($request->all());

        return fractal(User::find($request->get('user_id')), new UserTransformer())->respond();
    }

    /**
     * Pay order.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function pay(Request $request)
    {
        $amount = $request->get('amount');

        $this->setCallbacks();  //todo: add order id to callback
        $this->service->setAmount($amount);
        $response = $this->service->purchase();

        return $response->redirect();
    }

    /**
     * Success pay callback function.
     *
     * @return mixed
     */
    public function returnUrl()    //todo: add order
    {
        $this->setCallbacks();
        $this->service->setAmount("20.99");    //todo: get from order

        $response = $this->service->completePurchase();

        return $response->getData();
    }

    /**
     * Cancel pay callback function.
     */
    public function cancelUrl()
    {
    }

    /**
     * Set callbacks for paypal answer.
     */
    private function setCallbacks()
    {
        $this->service->setReturnUrl(route('.checkout.pay.success'));
        $this->service->setCancelUrl(route('.checkout.pay.cancel'));
    }
}
