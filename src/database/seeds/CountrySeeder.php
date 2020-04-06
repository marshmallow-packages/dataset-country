<?php

namespace Marshmallow\Datasets\Country\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Marshmallow\Datasets\Country\Models\Country;

/**
 * php artisan db:seed --class=Marshmallow\\Datasets\\Country\\Database\\Seeds\\CountrySeeder
 */

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$countries = json_decode(file_get_contents(__dir__ . '/countries/en.json'));
	    	foreach ($countries as $country) {
	    		Country::create([
	    			'name' => $country->name,
	    			'alpha2' => strtoupper($country->alpha2),
	    			'alpha3' => strtoupper($country->alpha3),
	    		]);
	    	}
    }
}
