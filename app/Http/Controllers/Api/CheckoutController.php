<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\BillingRequest;
use App\Http\Requests\Checkout\ShippingRequest;
use App\Models\Order;
use App\Models\OrderBilling;
use App\Models\OrderShipping;
use App\Models\User;
use App\Services\PayPal\PayPalService;
use App\Transformers\Api\OrderTransformer;
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
        $user = \Auth::user();
        $billing = OrderBilling::create([
            'first_name'    => $request->get('first_name'),
            'last_name'     => $request->get('last_name'),
            'email'         => $request->get('email'),
            'address'       => $request->get('address'),
            'country'       => $request->get('country'),
            'city'          => $request->get('city'),
            'state'         => $request->get('state'),
            'postcode'      => $request->get('postcode'),
            'phone'         => $request->get('phone'),
        ]);

        $order = Order::create([
            'user_id' => null !== $user ? $user->getKey() : null,
            'billing_id' => $billing->getKey(),
            'product_cost' => $request->get('product_cost'),
            'shipping_cost' => $request->get('shipping_cost'),
            'total_cost' => $request->get('product_cost') + $request->get('shipping_cost'),
            'count' => $request->get('count'),
            'state' => Order::ORDER_STATE_PENDINGPAYMENT,
        ]);

        return fractal($order, new OrderTransformer())->respond();
    }

    /**
     * Add shipping information.
     *
     * @param ShippingRequest $request
     *
     * @param Order $order
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function shipping(ShippingRequest $request, Order $order)
    {
        $shipping = OrderShipping::create([
            'first_name'    => $request->get('first_name'),
            'last_name'     => $request->get('last_name'),
            'address'       => $request->get('address'),
            'country'       => $request->get('country'),
            'city'          => $request->get('city'),
            'state'         => $request->get('state'),
            'postcode'      => $request->get('postcode'),
        ]);

        $order->update([
            'shipping_id' => $shipping->getKey(),
            'shipping_cost' => $request->get('shipping_cost'),
            'total_cost' => $order->product_cost + $request->get('shipping_cost'),
        ]);

        return fractal($order, new OrderTransformer())->respond();
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
