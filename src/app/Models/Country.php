<?php

namespace Marshmallow\Datasets\Country\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Country extends Model
{
	use HasSlug;

    protected $guarded = [];

    protected $defaultFlagSize = 32;

    public function scopeOrdered (Builder $builder)
    {
        $builder->orderBy('name', 'asc');
    }

    public function selected (Model $model)
    {
        return ($model->country && $model->country->id == $this->id) ? 'selected="selected"' : '';
    }

	public function getNameLocale ()
	{
		return trans('country::country.' . $this->slug);
	}

    public function getFlagAttribute ()
    {
        return $this->flag($this->defaultFlagSize);
    }

    public function flag (int $size)
    {
        return $this->buildFlagPublicUrl($size);
    }

    protected function buildFlagPublicUrl (int $size)
    {
        return join('/', [
            env('APP_URL'),
            $this->flagFolderLocation(),
            $this->flagSizeFolderName($size),
            $this->flagImageName(),
        ]);
    }

    protected function flagFolderLocation ()
    {
        return 'vendor/marshmallow/country/flags';
    }

    protected function flagSizeFolderName (int $size)
    {
        return $size . 'x' . $size;
    }

    protected function flagImageName ()
    {
        return sprintf(
            '%s.png',
            strtolower($this->alpha2)
        );
    }

	/**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}