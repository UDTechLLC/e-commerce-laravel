<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CartProductPivot extends Pivot
{
    protected $table = 'cart_product';
    /*
     * Entity mutators and accessors go below
     * */

    public function getDiscountAttribute($value)
    {
        return $value / 100;
    }

    public function getDiscountSumAttribute($value)
    {
        return $value / 100;
    }

    public function setDiscountAttribute($value)
    {
        $this->attributes['discount'] = $value * 100;
    }

    public function setDiscountSumAttribute($value)
    {
        $this->attributes['discount_sum'] = $value * 100;
    }
}
