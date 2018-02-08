<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Builder
};
use App\Models\EloquentModel;

/**
 * Class Order
 * @package App\Models
 */
class Order extends EloquentModel
{
    /**
     * @var string
     */
    const ORDER_STATE_CANCELED = 'CANCELED';
    const ORDER_STATE_COMPLETED = 'COMPLETED';
    const ORDER_STATE_FAILED = 'FAILED';
    const ORDER_STATE_ONHOLD = 'ON_HOLD';
    const ORDER_STATE_PENDINGPAYMENT = 'PENDING_PAYMENT';
    const ORDER_STATE_PROCESSING = 'PROCESSING';
    const ORDER_STATE_REFUNDED = 'REFUNDED';

    const ORDER_STATES = [
        self::ORDER_STATE_CANCELED,
        self::ORDER_STATE_COMPLETED,
        self::ORDER_STATE_FAILED,
        self::ORDER_STATE_ONHOLD,
        self::ORDER_STATE_PENDINGPAYMENT,
        self::ORDER_STATE_PROCESSING,
        self::ORDER_STATE_REFUNDED

    ];
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        // @todo:
        'user_id',
        'products_id',
        'amount',
        'count',
        'state',
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

    // @todo:

    /**
     * Entity public methods go below
     */

    // @todo:
}
