![alt text](https://cdn.marshmallow-office.com/media/images/logo/marshmallow.transparent.red.png "marshmallow.")

# Marshmallow Dataset Country
This dataset contains all the countries in the world. They are translateable in different languages. It is also possible to get the flag from said countries. The model is extendable so you can extend and overide all functionality if needed.

### Installatie
```
composer require marshmallow/dataset-country
```
# Seed the table
Run `php artisan db:seed --class=Marshmallow\\Datasets\\Country\\Seeders\\CountrySeeder` to seed the country table.

# Nova
Are you using Nova? We have a command for you to generate the Nova Resource. Run `php artisan marshmallow:resource Country Datasets\\Country` and countries will be available to you in Nova. We hide this resource by default in the Nova navigation. If you wish to have it available in the navigation, add `public static $displayInNavigation = true;` to `app/Nova/Country.php`.

# Methods
* Get the locale version of a country with `$country->getNameLocale()`.

# Flags
You can get the flag of a country with `$country->flag`. If you wish to specify the size of the flag image, you can use `$country->flag('16')`. The available sizes are 16x16, 24x24, 32x32, 48x48, 64x64 and 128x128. To make use of the flags you will need to publish the flags to your local project by running `php artisan vendor:publish --provider="Marshmallow\Datasets\Country\ServiceProvider" --tag=public --force`.

# Traits
Add the `HasCountry` trait on your models that have a country. This will set up the relationship and possibly give you extra methods in the future.

## Tests during development
`php artisan test packages/datasets/country`
* [ ]  Test that the seeder works
* [ ]  Check the translater works
* [ ]  Check it is slugged
* [ ]  Check name is unique
* [ ]  Check slug is unique
* [ ]  Check Alpha2 is unique
* [ ]  Check Alpha3 is unique
* [ ]  Check you can get the flag with magic ->flag.
* [ ]  Check you can get the flag with method flag().

## Translated
* [x]  Arabic (ar)
* [x]  Chinese (cn)
* [x]  Czech (cs)
* [x]  Danish (da)
* [x]  German (de)
* [x]  Greek (el)
* [x]  English (en)
* [x]  Spanish (es)
* [x]  Estonian (et)
* [x]  French (fr)
* [x]  Hungarian (hu)
* [x]  Italian (it)
* [x]  Japanese (ja)
* [x]  Lithuanian (lt)
* [x]  Dutch (nl)
* [x]  Norwegian (no)
* [x]  Polish (pl)
* [x]  Portuguese (pt)
* [x]  Romanian (ro)
* [x]  Russian (ru)
* [x]  Slovak (sk)
* [x]  Thai (th)
* [x]  Ukrainian (uk)


- - -

Copyright (c) 2020 marshmallow
