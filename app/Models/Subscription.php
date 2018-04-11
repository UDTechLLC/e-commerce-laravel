<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Builder
};
use App\Models\EloquentModel;

/**
 * Class Subscription
 * @package App\Models
 */
class Subscription extends EloquentModel
{
    const SUBSCRIPTION_ACTIVE = 'Active';
    const SUBSCRIPTION_CANCELED = 'Canceled';
    const SUBSCRIPTION_EXPIRED = 'Expired';
    const SUBSCRIPTION_PAST_DUE = 'Past due';
    const SUBSCRIPTION_PENDING = 'Pending';

    /**
     * @var string
     */
    protected $table = 'subscriptions';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name', 'braintree_id', 'braintree_plan', 'quantity',
        'trial_ends_at', 'ends_at', 'status'
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

    public static $statuses = [
        self::SUBSCRIPTION_ACTIVE,
        self::SUBSCRIPTION_CANCELED,
        self::SUBSCRIPTION_EXPIRED,
        self::SUBSCRIPTION_PAST_DUE,
        self::SUBSCRIPTION_PENDING,
    ];

    /**
     * Entity relations go below
     */

    public function user()
    {
        return $this->belongsTo(User::class);
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
