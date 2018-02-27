<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Builder
};
use App\Models\EloquentModel;

/**
 * Class Order
 * @package App\Models
 */
class Order extends EloquentModel
{
    /**
     * @var string
     */
    const ORDER_STATE_CANCELED = 'CANCELED';
    const ORDER_STATE_COMPLETED = 'COMPLETED';
    const ORDER_STATE_FAILED = 'FAILED';
    const ORDER_STATE_ONHOLD = 'ON_HOLD';
    const ORDER_STATE_PENDINGPAYMENT = 'PENDING_PAYMENT';
    const ORDER_STATE_PROCESSING = 'PROCESSING';
    const ORDER_STATE_REFUNDED = 'REFUNDED';

    const ORDER_STATES = [
        self::ORDER_STATE_CANCELED,
        self::ORDER_STATE_COMPLETED,
        self::ORDER_STATE_FAILED,
        self::ORDER_STATE_ONHOLD,
        self::ORDER_STATE_PENDINGPAYMENT,
        self::ORDER_STATE_PROCESSING,
        self::ORDER_STATE_REFUNDED

    ];
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        // @todo:
        'user_id',
        'shipping_id',
        'billing_id',
        'cart_id',
        'product_cost',
        'shipping_cost',
        'total_cost',
        'count',
        'state',
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

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function shipping()
    {
        return $this->belongsTo(OrderShipping::class);
    }

    public function billing()
    {
        return $this->belongsTo(OrderBilling::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count');
    }

    /**
     * Entity scopes go below
     */

    // @todo:

    /**
     * Entity mutators and accessors go below
     */

    public function setProductCostAttribute($value)
    {
        $this->attributes['product_cost'] = $value * 100;
    }

    public function setShippingCostAttribute($value)
    {
        $this->attributes['shipping_cost'] = $value * 100;
    }

    public function setTotalCostAttribute($value)
    {
        $this->attributes['total_cost'] = $value * 100;
    }

    public function getProductCostAttribute($value)
    {
        return  number_format($value / 100, 2);
    }

    public function getShippingCostAttribute($value)
    {
        return number_format($value / 100, 2);
    }

    public function getTotalCostAttribute($value)
    {
        return number_format($value / 100, 2);
    }

    /**
     * Entity public methods go below
     */

    // @todo:
}
