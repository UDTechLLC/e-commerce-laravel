<?php

declare(strict_types = 1);

function getShippingCost(string $country)
{
    return $country === 'United States'
        ? number_format(6.99, 2)
        : number_format(17.99, 2);
}
