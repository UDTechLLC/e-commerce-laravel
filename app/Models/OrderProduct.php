<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Builder, Relations\Pivot
};
use App\Models\EloquentModel;

/**
 * Class OrderProduct
 * @package App\Models
 */
class OrderProduct extends Pivot
{
    /**
     * @var string
     */
    protected $table = 'order_product';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        // @todo:
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [];

    /**
     * The relationships that should be touched on save.
     * @var array
     */
    protected $touches = [];

    /**
     * The relations to eager load on every query.
     * @var array
     */
    protected $with = [];

    /**
     * The accessors to append to the model's array form.
     * @var array
     */
    protected $appends = [];

    /**
     * Entity relations go below
     */

    // @todo:

    /**
     * Entity scopes go below
     */

    // @todo:

    /**
     * Entity mutators and accessors go below
     */

    /**
     * @param $value
     */
    public function setProductPriceAttribute($value)
    {
        $this->attributes['product_price'] = $value * 100;
    }

    public function getProductPriceAttribute($value)
    {
        return number_format($value / 100, 2, ".", "");
    }

    /**
     * Entity public methods go below
     */

    // @todo:
}
