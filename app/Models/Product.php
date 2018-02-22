<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Builder
};
use App\Models\EloquentModel;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class Product
 * @package App\Models
 */
class Product extends EloquentModel implements HasMedia
{

    use HasMediaTrait;
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = array(
        'title',
        'category',
        'description',
        'old_amount',
        'amount',
        'count',
        'view_name',
        'position',
        'slug'
    );

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

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
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
        return number_format($value / 100, 2);
    }

    /**
     * @return string
     */
    public function getTotalSumAttribute()
    {
        return number_format($this->attributes['amount'] * $this->pivot->count / 100, 2);
    }

    /**
     * Entity public methods go below
     */

    /**
     * @param $image
     * @param $collect
     *
     * @return \Spatie\MediaLibrary\Media
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\InvalidBase64Data
     */
    public function saveImageBase64($image, $collect)
    {
        $imageParts = explode(";base64,", $image);
        $imageTypeAux = explode("image/", $imageParts[0]);
        $imageType = $imageTypeAux[1];
        
        return $this->addMediaFromBase64($image)
            ->usingFileName($this->slug . "." . $imageType)
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
        $newMedia = $this->saveImageBase64($image, $collect);
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
}
