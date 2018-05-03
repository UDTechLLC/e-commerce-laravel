<?php

declare(strict_types = 1);

function getShippingCost(string $country)
{
//    return $country === 'United States'
//        ? number_format(6.99, 2)
//        : number_format(17.99, 2);
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
