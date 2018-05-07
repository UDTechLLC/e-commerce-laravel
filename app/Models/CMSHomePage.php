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
 * Class CMSHomePage
 * @package App\Models
 */
class CMSHomePage extends EloquentModel implements HasMedia
{
    use HasMediaTrait;
    /**
     * @var string
     */
    protected $table = 'cms_home_pages';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'link'
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
     * @return string
     */
    public function getDesktopImageAttribute()
    {
        return $this->getFirstMediaUrl('desktop');
    }

    /**
     * @return string
     */
    public function getMobileImageAttribute()
    {
        return $this->getFirstMediaUrl('mobile');
    }

    /**
     * Entity public methods go below
     */

    // @todo:
}
