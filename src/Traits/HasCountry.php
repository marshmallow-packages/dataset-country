<?php

namespace Marshmallow\Datasets\Country\Traits;

use Marshmallow\Datasets\Country\Models\Country;

/**
 * Trait HasCountry
 * 
 * Add this trait to your models that have a country relationship.
 * This trait is intended to be used by external applications
 * that install this package.
 * 
 * @package Marshmallow\Datasets\Country\Traits
 */
trait HasCountry
{
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
