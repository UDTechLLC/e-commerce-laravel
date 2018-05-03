<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Builder
};
use App\Models\EloquentModel;

/**
 * Class Shipping
 * @package App
 */
class Shipping extends EloquentModel
{
    /**
     * @var string
     */
    protected $table = 'shipping';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'country', 'cost', 'isFree',
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

    // @todo:

    /**
     * Entity scopes go below
     */

    // @todo:

    /**
     * Entity mutators and accessors go below
     */

    /**
     * @param $value
     */
    public function setCostAttribute($value)
    {
        $this->attributes['cost'] = $value * 100;
    }

    /**
     * @param $value
     *
     * @return string
     */
    public function getCostAttribute($value)
    {
        return number_format($value / 100, 2);
    }

    /**
     * Entity public methods go below
     */

    // @todo:
}
