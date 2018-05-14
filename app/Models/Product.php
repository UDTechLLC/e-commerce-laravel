<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Builder, Model
};
use App\Models\EloquentModel;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class Product
 * @package App\Models
 */
class Product extends Model implements HasMedia
{
    use HasMediaTrait;

    const VIEW_NAME_SHOW = 'show';
    const VIEW_NAME_12WEEK_MEAL = '12week-custom-meal-plan';
    const VIEW_NAME_BOGO_12WEEK_MEAL = 'bogo-12week-custom-meal-plan';
    const VIEW_NAME_12WEEK_TRAINING = '12week-custom-training-plan';
    const VIEW_NAME_BOGO_12WEEK_TRAINING = 'bogo-12week-custom-training-plan';
    const VIEW_NAME_14DAY_DETOX = '14-day-detox-guide';
    const VIEW_NAME_NEVER_STOP = 'never-stop-moving-e-book';
    const VIEW_NAME_QUEEN_OF_THE_HILL = 'queen-of-the-hill';
    const VIEW_NAME_RESISTANCE_BANDS = 'resistance-bands';
    const VIEW_NAME_INFUSER_BOTTLE = 'shedfat-infuser-bottle';
    const VIEW_NAME_SHEDFAT_MAX = 'shedfat-maxx';
    const VIEW_NAME_WHAT_TO_EAT = 'what-to-eat-in-the-streets';
    const VIEW_NAME_DAD_HAT = 'shedfat-dad-hat';
    const VIEW_NAME_LEGS_ON_FIRE ='legs-on-fire';
    const VIEW_NAME_SHAKER = 'shedFat-shaker';
    const VIEW_NAME_GYM_BAG ='gym-bag';
    const VIEW_NAME_WEIGHT_LOSS_BUNDLE = 'weight-loss-bundle';

    const VIEW_NAMES = [
        self::VIEW_NAME_SHOW,
        self::VIEW_NAME_12WEEK_MEAL,
        self::VIEW_NAME_BOGO_12WEEK_MEAL,
        self::VIEW_NAME_12WEEK_TRAINING,
        self::VIEW_NAME_BOGO_12WEEK_TRAINING ,
        self::VIEW_NAME_14DAY_DETOX,
        self::VIEW_NAME_NEVER_STOP,
        self::VIEW_NAME_QUEEN_OF_THE_HILL,
        self::VIEW_NAME_RESISTANCE_BANDS,
        self::VIEW_NAME_INFUSER_BOTTLE,
        self::VIEW_NAME_SHEDFAT_MAX,
        self::VIEW_NAME_WHAT_TO_EAT,
        self::VIEW_NAME_DAD_HAT,
        self::VIEW_NAME_LEGS_ON_FIRE,
        self::VIEW_NAME_SHAKER,
        self::VIEW_NAME_GYM_BAG,
        self::VIEW_NAME_WEIGHT_LOSS_BUNDLE
    ];

    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'plan_id',
        'title',
        'category',
        'description',
        'old_amount',
        'amount',
        'count',
        'view_name',
        'position',
        'isVirtual',
        'slug',
        'published',
        'visible'
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
    protected $casts = ['isVirtual' => 'boolean'];

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

    public function carts()
    {
        return $this->belongsToMany(Cart::class)
            ->withPivot(['count', 'product_price', 'subscribe_period'])
            ->withTimestamps()
            ->using(CartProductPivot::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class);
    }

    public function bandls()
    {
        return $this->hasOne(Product::class, 'parent_id', 'id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    /**
     * Entity scopes go below
     */

    // @todo:

    /**
     * Entity mutators and accessors go below
     *
     * @param $value
     *
     * @return float|int
     */

    /**
     * @param $value
     *
     * @return string
     */
    public function getAmountAttribute($value)
    {
        return number_format($value / 100, 2, ".", "");
    }

    /**
     * @return string
     */
    public function getTotalSumAttribute()
    {
        return number_format($this->attributes['amount'] * $this->pivot->count / 100, 2, ".", "");
    }

    /**
     * @param $value
     *
     * @return string
     */
    public function getOldAmountAttribute($value)
    {
        return ($value) ? number_format($value / 100, 2, ".", "") : 0;
    }

    public function getProductLinkAttribute()
    {
        //if ($this->isVirtual()) {
            $media = $this->getMedia('products')->first();

            return $media->hasCustomProperty('external_link')
                ? $media->getCustomProperty('external_link')
                : asset($this->getFirstMediaUrl('download'));
      //  }
    }

    public function getDiscountAmountAttribute()
    {
        return number_format($this->pivot->discount, 2, ".", "");
    }

    public function getDiscountAmountSumAttribute()
    {
        return number_format($this->pivot->discount_sum, 2, ".", "");
    }

    /**
     * Entity public methods go below
     */

    /**
     * @param $value
     *
     * @return string
     */
    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = $value * 100;
    }

    /**
     *   /**
     * @param $value
     *
     * @return string
     */
    public function setOldAmountAttribute($value)
    {
        $this->attributes['old_amount'] = $value * 100;
    }

    /**
     * @param $order
     * @return mixed
     */
    public function generateProductLink($order)
    {
        $product = $this;
        if ($this->bandls && $order->products()->wherePivot('product_id', $this->bandls->id)->first()) {
            $product = $order->products()->wherePivot('product_id', $this->bandls->id)->first();
        }

        return $product->getMedia('products')->first()->getCustomProperty('external_link');
    }

    /**
     * @param $image
     * @param $collect
     * @param $properties
     *
     * @return \Spatie\MediaLibrary\Media
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\InvalidBase64Data
     */
    public function saveImageBase64($image, $collect, $properties = [])
    {
        $imageParts = explode(";base64,", $image);
        $imageTypeAux = explode("image/", $imageParts[0]);
        $imageType = $imageTypeAux[1];

        return $this->addMediaFromBase64($image)
            ->usingFileName($this->slug . "." . $imageType)
            ->withCustomProperties($properties)
            ->toMediaCollection($collect);
    }


    // @todo:

    /**
     * @param $image
     * @param $collect
     *
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\InvalidBase64Data
     * @throws \Spatie\MediaLibrary\Exceptions\MediaCannotBeUpdated
     */
    public function updateImageBase64($image, $collect)
    {
        $newMedia = $this->saveImageBase64($image, $collect, $this->getFirstMedia('products')->custom_properties);
        $arr = ['id' => $newMedia->id];
        $this->updateMedia([$arr], $collect);
    }

    // @todo:

    /**
     * @return string
     */

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return bool
     */
    public function isVirtual(): bool
    {
        return $this->isVirtual;
    }

    public function getTotalSumWithDiscount()
    {
        return number_format($this->total_sum - $this->pivot->discount_sum, 2, ".", "");
    }

    public function getAmountWithDiscount()
    {
        return number_format($this->amount - $this->pivot->discount, 2, ".", "");
    }

    public function hasPlan()
    {
        return null !== $this->plan;
    }
}
