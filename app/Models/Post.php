<?php
declare(strict_types = 1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\{
    Builder
};
use App\Models\EloquentModel;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class Post
 * @package App\Models
 */
class Post extends EloquentModel implements HasMedia
{
    use HasMediaTrait;

    /**
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'author_id', 'category_id', 'slug', 'title', 'content',
        'meta_title', 'meta_description', 'meta_keywords', 'published', 'posted_at',
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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['posted_at'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Entity relations go below
     */

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Entity scopes go below
     */

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->where('published', true)->where('posted_at', '<=', Carbon::now());
    }

    /**
     * @param $query
     * @param $value
     *
     * @return mixed
     */
    public function scopeFilterCategory($query, $value)
    {
        return null === $value
            ? $query
            : $query->whereHas('category', function ($q) use ($value) {
                return $q->where('id', $value);
            });
    }

    // @todo:

    /**
     * Entity mutators and accessors go below
     */

    /**
     * @return string
     */
    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('banner');
    }

    /**
     * @return string
     */
    public function getPreviewImageAttribute()
    {
        return $this->getFirstMediaUrl('preview');
    }

    // @todo:

    /**
     * Entity public methods go below
     */

    // @todo:
}
