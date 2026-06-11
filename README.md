![alt text](https://cdn.marshmallow-office.com/media/images/logo/marshmallow.transparent.red.png "marshmallow.")

# Marshmallow Dataset Country

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marshmallow/dataset-country.svg?style=flat-square)](https://packagist.org/packages/marshmallow/dataset-country)
[![Total Downloads](https://img.shields.io/packagist/dt/marshmallow/dataset-country.svg?style=flat-square)](https://packagist.org/packages/marshmallow/dataset-country)

This dataset contains all the countries in the world. They are translateable in different languages. It is also possible to get the flag from said countries. The model is extendable so you can extend and override all functionality if needed.

## Installation

Install the package via Composer:

```bash
composer require marshmallow/dataset-country
```

The service provider is auto-discovered and the package migrations are loaded automatically, so you only need to run your migrations:

```bash
php artisan migrate
```

This creates a `countries` table with `name`, `slug`, `alpha2` and `alpha3` columns (each unique).

### Seed the table

Run the bundled seeder to fill the `countries` table:

```bash
php artisan db:seed --class="Marshmallow\Datasets\Country\Seeders\CountrySeeder"
```

### Publish the flags

To use the flag images you need to publish them to your local project:

```bash
php artisan vendor:publish --provider="Marshmallow\Datasets\Country\ServiceProvider" --tag=public --force
```

You can optionally publish the translations as well:

```bash
php artisan vendor:publish --provider="Marshmallow\Datasets\Country\ServiceProvider" --tag=translations
```

## Usage

The package ships an Eloquent model at `Marshmallow\Datasets\Country\Models\Country`.

```php
use Marshmallow\Datasets\Country\Models\Country;

// Look up a country by its ISO alpha-2 code.
$country = Country::alpha2('nl');

// Get all countries ordered by name.
$countries = Country::ordered()->get();
```

### Methods

* Get the locale (translated) version of a country name with `$country->getNameLocale()`.

### Flags

You can get the flag of a country with `$country->flag`. If you wish to specify the size of the flag image, you can use `$country->flag(16)`. The available sizes are 16, 24, 32, 48, 64 and 128 (the default is 32). Remember to publish the flags first (see Installation).

### Traits

Add the `Marshmallow\Datasets\Country\Traits\HasCountry` trait to your models that have a country. This sets up the `country()` relationship:

```php
use Marshmallow\Datasets\Country\Traits\HasCountry;

class Address extends Model
{
    use HasCountry;
}

// $address->country instanceof Country
```

### Nova

Are you using Nova? We have a command for you to generate the Nova Resource. Run `php artisan marshmallow:resource Country Datasets\\Country` and countries will be available to you in Nova. We hide this resource by default in the Nova navigation. If you wish to have it available in the navigation, add `public static $displayInNavigation = true;` to `app/Nova/Country.php`.

### Provinces, cities and airports

The model also exposes a `provinces()` relationship. This requires the optional [`marshmallow/dataset-google-geotargets`](https://packagist.org/packages/marshmallow/dataset-google-geotargets) package, which provides Google data on provinces, cities, airports etc.

```bash
composer require marshmallow/dataset-google-geotargets
```

## Translations

The country names are translated into the following languages:

* [x] Arabic (ar)
* [x] Chinese (cn)
* [x] Czech (cs)
* [x] Danish (da)
* [x] German (de)
* [x] Greek (el)
* [x] English (en)
* [x] Spanish (es)
* [x] Estonian (et)
* [x] French (fr)
* [x] Hungarian (hu)
* [x] Italian (it)
* [x] Japanese (ja)
* [x] Lithuanian (lt)
* [x] Dutch (nl)
* [x] Norwegian (no)
* [x] Polish (pl)
* [x] Portuguese (pt)
* [x] Romanian (ro)
* [x] Russian (ru)
* [x] Slovak (sk)
* [x] Thai (th)
* [x] Ukrainian (uk)

## Security Vulnerabilities

Please report security vulnerabilities by email to [stef@marshmallow.dev](mailto:stef@marshmallow.dev) rather than via the public issue tracker.

## Credits

- [Stef](https://marshmallow.dev)
- [All Contributors](https://github.com/marshmallow-packages/dataset-country/contributors)

## License

The MIT License (MIT). Please see the [License File](LICENSE) for more information.

- - -

Copyright (c) 2020 marshmallow
