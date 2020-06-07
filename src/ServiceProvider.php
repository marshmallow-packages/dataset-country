<?php

namespace Marshmallow\Datasets\Country;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/country.php',
            'country'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/country.php' => config_path('country.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'country');

        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/example'),
        ], 'translations');

        $this->publishes([
            __DIR__.'/../resources/public' => public_path('vendor/marshmallow/country'),
        ], 'public');
    }
}
