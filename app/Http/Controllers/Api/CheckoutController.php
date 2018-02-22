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
        $billing = $this->createBilling($request);

        $order = $this->createOrder($request, $user, $billing);

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
        $shipping = $this->createShipping($request);
        $this->updateOrder($request, $order, $shipping);

        return fractal($order, new OrderTransformer())->respond();
    }

    /**
     * Pay order.
     *
     * @param Request $request
     *
     * @param Order $order
     *
     * @return mixed
     */
    public function pay(Request $request, Order $order)
    {
        $this->setCallbacks($order);
        $this->service->setAmount($order->total_cost);
        $response = $this->service->purchase();

        if (!$response->isRedirect()) {
            return route('/');  //todo: Add error
        }

        return $response->redirect();
    }

    /**
     * Success pay callback function.
     *
     * @param Request $request
     * @param Order $order
     *
     * @return mixed
     */
    public function returnUrl(Request $request, Order $order)
    {
        $this->setCallbacks($order);
        $this->service->setAmount($order->total_cost);

        $response = $this->service->completePurchase();

        return view('checkout_thank_you');
    }

    /**
     * Cancel pay callback function.
     */
    public function cancelUrl()
    {
    }

    /**
     * Set callbacks for paypal answer.
     *
     * @param $order
     */
    private function setCallbacks($order)
    {
        $this->service->setReturnUrl(route('.checkout.pay.success', ['order' => $order->getKey()]));
        $this->service->setCancelUrl(route('.checkout.pay.cancel', ['order' => $order->getKey()]));
    }

    /**
     * Add billing information.
     *
     * @param $request
     *
     * @return mixed
     */
    private function createBilling($request)
    {
        return OrderBilling::create([
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
    }

    /**
     * Create order.
     *
     * @param $request
     * @param $user
     * @param $billing
     *
     * @return mixed
     */
    private function createOrder($request, $user, $billing)
    {
        return Order::create([
            'user_id' => null !== $user ? $user->getKey() : null,
            'billing_id' => $billing->getKey(),
            'product_cost' => $request->get('product_cost'),
            'shipping_cost' => $request->get('shipping_cost'),
            'total_cost' => $request->get('product_cost') + $request->get('shipping_cost'),
            'count' => $request->get('count'),
            'state' => Order::ORDER_STATE_PENDINGPAYMENT,
        ]);
    }

    /**
     * Create shipping.
     *
     * @param $request
     *
     * @return mixed
     */
    private function createShipping($request)
    {
        return OrderShipping::create([
            'first_name'    => $request->get('first_name'),
            'last_name'     => $request->get('last_name'),
            'address'       => $request->get('address'),
            'country'       => $request->get('country'),
            'city'          => $request->get('city'),
            'state'         => $request->get('state'),
            'postcode'      => $request->get('postcode'),
        ]);
    }

    /**
     * Update order.
     *
     * @param $request
     * @param $order
     * @param $shipping
     */
    public function updateOrder($request, $order, $shipping)
    {
        $order->update([
            'shipping_id' => $shipping->getKey(),
            'shipping_cost' => $request->get('shipping_cost'),
            'total_cost' => $order->product_cost + $request->get('shipping_cost'),
        ]);
    }
}
