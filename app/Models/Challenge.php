<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Builder, Model
};
use App\Models\EloquentModel;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class Challenge
 * @package App\Models
 */
class Challenge extends Model implements HasMedia
{
    use HasMediaTrait;
    /**
     * @var string
     */
    protected $table = 'challenges';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'title',
        'published',
        'open'
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
    
    /**
     * @param $image
     * @param $collect
     * @param $properties
     *
     * @return \Spatie\MediaLibrary\Media
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\InvalidBase64Data
     */
    public function saveImageBase64($image, $collect, $properties = [])
    {
        $imageParts = explode(";base64,", $image);
        $imageTypeAux = explode("image/", $imageParts[0]);
        $imageType = $imageTypeAux[1];

        return $this->addMediaFromBase64($image)
            ->usingFileName($this->title . "." . $imageType)
            ->withCustomProperties($properties)
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
