<?php
declare(strict_types = 1);

namespace App\Models;

use App\Traits\CustomBillable;
use Illuminate\Notifications\Notifiable,
    Illuminate\Foundation\Auth\User as Authenticatable,
    Laratrust\Traits\LaratrustUserTrait,
    Laravel\Cashier\Billable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class User extends Authenticatable implements HasMedia
{
    use LaratrustUserTrait,
        Notifiable,
        HasMediaTrait,
        CustomBillable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'address', 'company_name', 'apartment', 'country', 'city', 'state',
        'postcode', 'phone', 'password', 'cart_id', 'stripe_id', 'card_brand', 'card_last_four', 'trial_ends_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
       'avatar'
    ];
    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get the user's avatar.
     *
     * @return string
     */
    public function getAvatarAttribute()
    {
        return $this->getFirstMediaUrl('avatar') ?? "";
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customSubscriptions()
    {
        return $this->hasMany(CustomSubscription::class);
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
    public function saveImageBase64($image, $collect)
    {
        $imageParts = explode(";base64,", $image);
        $imageTypeAux = explode("image/", $imageParts[0]);
        $imageType = $imageTypeAux[1];

        return $this->addMediaFromBase64($image)
            ->usingFileName(str_slug($this->first_name) . "." . $imageType)
            ->toMediaCollection($collect);
    }


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
}
