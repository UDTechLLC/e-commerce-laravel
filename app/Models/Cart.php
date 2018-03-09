<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Builder
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
            ->withPivot(['count', 'discount', 'discount_sum']);
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

    public function getProductsSum()
    {
        $sum = 0;

        foreach ($this->products as $product) {
            $sum += $product->pivot->count * $product->amount;
        }

        return number_format($sum, 2);
    }

    public function getDiscountSum()
    {
        return number_format((float)$this->products()->withPivot('discount_sum')->sum('discount_sum'), 2);
    }

    public function getWithDiscountSum()
    {
        return number_format($this->getProductsSum() - $this->getDiscountSum(), 2);
    }

    public function getProductsCount()
    {
        return $this->products()->withPivot('count')->sum('cart_product.count');
    }

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
}
