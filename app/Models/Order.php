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
    const ORDER_STATE_ON_HOLD = 'ON_HOLD';
    const ORDER_STATE_PENDING_PAYMENT = 'PENDING_PAYMENT';
    const ORDER_STATE_PENDING_SHIPMENT = 'PENDING_SHIPMENT';
    const ORDER_STATE_PROCESSING = 'PROCESSING';
    const ORDER_STATE_REFUNDED = 'REFUNDED';
    const ORDER_STATE_SHIPPED = 'SHIPPED';

    const ORDER_PAYPAL_PAYMENT_METHOD = 'paypal_account';
    const ORDER_CREDIT_CARD_PAYMENT_METHOD = 'credit_card';
    const ORDER_UNKNOWN_PAYMENT_METHOD = 'unknown_payment_method';

    const ORDER_STATES = [
        self::ORDER_STATE_CANCELED,
        self::ORDER_STATE_COMPLETED,
        self::ORDER_STATE_FAILED,
        self::ORDER_STATE_ON_HOLD,
        self::ORDER_STATE_PENDING_PAYMENT,
        self::ORDER_STATE_PENDING_SHIPMENT,
        self::ORDER_STATE_PROCESSING,
        self::ORDER_STATE_REFUNDED,
        self::ORDER_STATE_SHIPPED,

    ];

    const ORDER_PAYMENT_METHODS = [
        self::ORDER_PAYPAL_PAYMENT_METHOD,
        self::ORDER_CREDIT_CARD_PAYMENT_METHOD,
    ];

    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        // @todo:
        'order_key',
        'user_id',
        'shipping_id',
        'billing_id',
        'cart_id',
        'coupon_id',
        'payment_method',
        'product_cost',
        'shipping_cost',
        'discount_cost',
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
        return $this->belongsTo(User::class);
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

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
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
        return  number_format($value / 100, 2, ".", "");
    }

    public function getShippingCostAttribute($value)
    {
        return number_format($value / 100, 2, ".", "");
    }

    public function getTotalCostAttribute($value)
    {
        return number_format($value / 100, 2, ".", "");
    }

    /**
     * Entity public methods go below
     */

    public function isShipping(): bool
    {
        /** @var Product $product */

        foreach ($this->products as $product) {
            if (!$product->isVirtual()) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return Product
     */
    public function getSubscriptionProduct()
    {
        /** @var Product $product */
        foreach ($this->products as $product) {
            if ($product->hasPlan()) {
                return $product;
            }
        }
    }

    public function getPaymentMethodSlugAttribute()
    {
        $map = [
            Order::ORDER_PAYPAL_PAYMENT_METHOD => 'Pay Pal',
            Order::ORDER_CREDIT_CARD_PAYMENT_METHOD => 'Credit Card',
        ];

        return $map[$this->attributes['payment_method']] ?? Order::ORDER_UNKNOWN_PAYMENT_METHOD;
    }
}
