<?php

namespace App\Transformers\Api;

use App\Models\Subscription;
use League\Fractal\TransformerAbstract;

class SubscriptionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Subscription $subscription
     *
     * @return array
     */
    public function transform(Subscription $subscription)
    {
        return [
            'id'            => $subscription->getKey(),
            'subscription'  => $subscription->name,
            'braintree_id'  => $subscription->braintree_id,
            'plan'          => $subscription->braintree_plan,
            'status'        => $subscription->status,
            'trial_ends_at' => $subscription->trial_ends_at,
            'end date'      => $subscription->ends_at,
            'user name'     => $subscription->user->full_name,
            'user email'    => $subscription->user->email,
            'user phone'    => $subscription->user->phone,
        ];
    }
}
