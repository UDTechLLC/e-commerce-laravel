<?php
declare(strict_types = 1);

function getShippingCost(string $country, $isSubscription = false)
{
    if ($isSubscription) {
        return $country === 'United States' ? 6.99 : 17.99;
    }

    $shipping = App\Models\Shipping::where('country', $country)->first();

    $other = App\Models\Shipping::where('country', \App\Models\Shipping::OTHER)->first();
    $freeCost = number_format(0, 2);

    if (null !== $shipping) {
        return $shipping->isFree ? $freeCost : $shipping->cost;
    } elseif (null !== $other) {
        return $other->isFree ? $freeCost : $other->cost;
    }

    return $freeCost;
}

function freeShipping()
{
    $shipping = \App\Models\Shipping::where('country', \App\Models\Shipping::USA)->first();
    
    return ($shipping->isFree) ? $shipping->isFree : 0;
}
