<?php

namespace Marshmallow\Datasets\Country\Traits;

use Marshmallow\Datasets\Country\Models\Country;

trait HasCountry
{
	public function country ()
	{
		return $this->belongsTo(Country::class);
	}
}