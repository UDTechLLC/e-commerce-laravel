<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Notifications\Notifiable,
    Illuminate\Foundation\Auth\User as Authenticatable,
    Laratrust\Traits\LaratrustUserTrait,
    Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use LaratrustUserTrait,
        Notifiable;
    use Billable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'address', 'country', 'city', 'state', 'postcode', 'phone',
        'password', 'cart_id', 'stripe_id', 'card_brand', 'card_last_four', 'trial_ends_at'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
}
