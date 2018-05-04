<?php

declare(strict_types = 1);

function getShippingCost(string $country)
{
    $shipping = App\Models\Shipping::where('country', $country)->first();
    $other = App\Models\Shipping::where('country', 'other')->first();
    $freeCost = number_format(0, 2);

    return
        null !== $shipping
            ? $shipping->isFree
                ? $freeCost
                : $shipping->cost
            : $other->isFree
                ? $freeCost
                : $other->cost;
}

function freeShipping()
{
    $shipping = \App\Models\Shipping::where('country', \App\Models\Shipping::USA)->first();

    return $shipping->isFree;
}
