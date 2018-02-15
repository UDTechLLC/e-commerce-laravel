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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
