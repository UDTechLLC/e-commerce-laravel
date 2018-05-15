<?php

namespace App\Transformers\Api;

use App\Models\CustomSubscription;
use League\Fractal\TransformerAbstract;

class CustomSubscriptionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param CustomSubscription $subscription
     *
     * @return array
     */
    public function transform(CustomSubscription $subscription)
    {
        return [
            'id'              => $subscription->getKey(),
            'status'          => $subscription->status,
            'user name'       => $subscription->user->full_name,
            'user email'      => $subscription->user->email,
            'user phone'      => $subscription->user->phone,
            'start date'      => $subscription->created_at->toFormattedDateString(),
            'next payment'    => $subscription->next_billing_at->toFormattedDateString(),
            'last order date' => $subscription->updated_at->toFormattedDateString(),
            'period'          => $subscription->period,
        ];
    }
}
