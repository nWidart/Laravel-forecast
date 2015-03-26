<?php namespace Nwidart\LaravelForecast;

use Forecast\Forecast;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class LaravelForecastServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->package('nwidart/laravel-forecast');

        $this->app->bindShared('Forecast\Forecast', function ($app) {
            return new Forecast($app['config']->get('laravel-forecast::API_KEY'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['forecast'];
    }

}
