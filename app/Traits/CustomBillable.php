<?php

declare(strict_types = 1);

namespace App\Traits;

use App\Models\Order;
use App\Models\Product;
use Laravel\Cashier\Billable;

/**
 * Trait CustomBillable
 * @package App\Traits
 */
trait CustomBillable
{
    use Billable;

    /**
     * @param Order $order
     *
     * @return mixed
     * @throws \Exception
     */
    public function newCustomSubscription($token, Order $order, $period)
    {
        $customer = $this->getBraintreeCustomer($token);
        /** @var Product $product */
        $product = $order->getSubscriptionProduct();
        $plan = $product->plan;
        $cost = $plan->cost;

        $result = $this->charge($cost, ['orderId' => $order->order_id]);

        if ($result->success) {
            return $this->customSubscriptions()->create([
                'user_id' => $this->getKey(),
                'order_id' => $order->getKey(),
                'period' => $period,
                'status' => 'Active',
                'next_billing_at' => now()->addDays($period),
            ]);
        }

        return null;
    }

    /**
     * Get the Braintree customer instance for the current user and token.
     *
     * @param  string|null $token
     * @param  array $options
     *
     * @return \Braintree\Customer
     * @throws \Exception
     */
    protected function getBraintreeCustomer($token = null, array $options = [])
    {
        if (!$this->braintree_id) {
            $customer = $this->createAsBraintreeCustomer($token, $options);
        } else {
            $customer = $this->asBraintreeCustomer();

            if ($token) {
                $this->updateCard($token);
            }
        }

        return $customer;
    }
}
