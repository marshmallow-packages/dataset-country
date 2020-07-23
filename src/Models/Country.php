<?php

namespace Marshmallow\Datasets\Country\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Exception;

class Country extends Model
{
	use HasSlug;

    protected $guarded = [];

    protected $defaultFlagSize = 32;

    public function scopeOrdered(Builder $builder)
    {
        $builder->orderBy('name', 'asc');
    }

    public static function alpha2(string $alpha2)
    {
    	return self::whereAlpha2($alpha2)->first();
    }

    public function selected(Model $model)
    {
        return ($model->country && $model->country->id == $this->id) ? 'selected="selected"' : '';
    }

	public function getNameLocale()
	{
		return trans('country::country.' . $this->slug);
	}

    public function getFlagAttribute()
    {
        return $this->flag($this->defaultFlagSize);
    }

    public function flag(int $size)
    {
        return $this->buildFlagPublicUrl($size);
    }

    protected function buildFlagPublicUrl(int $size)
    {
        return join(
            '/',
            [
                env('APP_URL'),
                $this->flagFolderLocation(),
                $this->flagSizeFolderName($size),
                $this->flagImageName(),
            ]
        );
    }

    protected function flagFolderLocation()
    {
        return 'vendor/marshmallow/country/flags';
    }

    protected function flagSizeFolderName(int $size)
    {
        return $size . 'x' . $size;
    }

    protected function flagImageName()
    {
        return sprintf(
            '%s.png',
            strtolower($this->alpha2)
        );
    }

    /**
     * Relations
     */
    protected function googleGeoTargetIsAvailable()
    {
    	if (!class_exists(\Marshmallow\Datasets\GoogleGeoTargets\Models\GoogleGeoTarget::class)) {
    		throw new Exception('GoogleGeoTarget not found. Please run composer require marshmallow/dataset-google-geotargets');
    	}
    }
    public function provinces()
    {
    	$this->googleGeoTargetIsAvailable();

    	return $this->hasMany(\Marshmallow\Datasets\GoogleGeoTargets\Models\GoogleGeoTarget::class, 'country_id')
    				->select('google_geo_targets.*')
    				->join(
    					'google_geo_target_types',
    					'google_geo_targets.google_geo_target_type_id',
    					'=',
    					'google_geo_target_types.id'
    				)
    				->where(
    					'google_geo_target_types.google_name',
    					\Marshmallow\Datasets\GoogleGeoTargets\Models\GoogleGeoTarget::PROVINCE
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
