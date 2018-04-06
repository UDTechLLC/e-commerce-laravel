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
            'name'          => $subscription->name,
            'braintree_id'  => $subscription->braintree_id,
            'plan'          => $subscription->braintree_plan,
            'status'        => $subscription->status,
            'trial_ends_at' => $subscription->trial_ends_at,
            'ends_at'       => $subscription->ends_at,
            'user'          => fractal($subscription->user, new UserTransformer()),
        ];
    }
}
