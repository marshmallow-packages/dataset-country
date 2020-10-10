<?php

namespace Marshmallow\Datasets\Country\Seeders;

use Illuminate\Database\Seeder;
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
            Country::updateOrCreate([
                    'name' => $country->name,
                    'alpha2' => strtoupper($country->alpha2),
                    'alpha3' => strtoupper($country->alpha3),
                ], [
                    'alpha2' => strtoupper($country->alpha2),
                    'alpha3' => strtoupper($country->alpha3),
                ]);
        }
    }
}
