<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Model
};
use App\Models\EloquentModel;

/**
 * Class Cart
 * @package App\Models
 */
class Cart extends EloquentModel
{
    /**
     * @var string
     */
    protected $table = 'carts';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'user_id',
        'coupon_id',
        'hash'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this
            ->belongsToMany(Product::class)
            ->withPivot(['count', 'discount', 'discount_sum', 'subscribe_period'])
            ->using(CartProductPivot::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
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

    // @todo:

    /**
     * Entity public methods go below
     */

    /**
     * @return string
     */
    public function getProductsCost()
    {
        $sum = 0;

        foreach ($this->products as $product) {
            $sum += $product->pivot->count * $product->amount;
        }

        return number_format($sum, 2, ".", "");
    }

    /**
     * @return string
     */
    public function getDiscountCost()
    {
        $discount = 0;
        foreach ($this->products as $product) {
            $discount += $product->pivot->discount_sum;
        }

        //return number_format((float)$this->products()->withPivot('discount_sum')->sum('discount_sum'), 2, ".", "");
        return number_format($discount, 2, ".", "");
    }

    /**
     * @return string
     */
    public function getWithDiscountCost()
    {
        return number_format($this->getProductsCost() - $this->getDiscountCost(), 2, ".", "");
    }

    /**
     * @return mixed
     */
    public function getProductsCount()
    {
        return $this->products()->withPivot('count')->sum('cart_product.count');
    }

    /**
     * @return bool
     */
    public function isShipping()
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
     * @return bool
     */
    public function isSubscribe(): bool
    {
        foreach ($this->products as $product) {
            if ($product->hasPlan()) {
                return true;
            }
        }

        return false;
    }

    public function clear()
    {
        $this->products()->detach();
        $this->coupon()->dissociate();
        $this->save();
    }
}
