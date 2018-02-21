<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Builder
};
use App\Models\EloquentModel;

/**
 * Class Shipping
 * @package App\Models
 */
class Shipping extends EloquentModel
{
    /**
     * @var string
     */
    protected $table = 'shippings';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'company_name', 'address', 'apartment', 'country', 'city', 'state',
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

    public function orders()
    {
        return $this->hasMany(Order::class);
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

    // @todo:
}
