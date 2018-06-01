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
            'id'                => $subscription->getKey(),
            'subscription'      => $subscription->name,
            'braintree_id'      => $subscription->braintree_id,
            'plan'              => $subscription->braintree_plan,
            'status'            => $subscription->status,
            'trial_ends_at'     => $subscription->trial_ends_at,
            'end date'          => $subscription->ends_at,
            'user name'         => $subscription->user->full_name,
            'user braintree id' => $subscription->user->braintree_id,
            'user email'        => $subscription->user->email,
            'user phone'        => $subscription->user->phone,
            'start date'        => $subscription->created_at->toFormattedDateString(),
            'next payment'      => is_null($subscription->ends_at) ? '' :
                                    $subscription->ends_at->toFormattedDateString(),
        ];
    }
}
