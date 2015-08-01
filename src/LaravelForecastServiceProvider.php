<?php namespace Nwidart\LaravelForecast;

use Forecast\Forecast;
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
        $this->registerConfiguration();

        $this->app->singleton(\Forecast\Forecast::class, function ($app) {
            return new Forecast($app['config']->get('laravel-forecast.API_KEY'));
        });
    }

    /**
     * Register the configuration file so Laravel can publish them
     * Also merges the published config file with original
     */
    private function registerConfiguration()
    {
        $configPath = __DIR__ . '/../config/laravel-forecast.php';
        $this->mergeConfigFrom($configPath, 'laravel-forecast');
        $this->publishes([$configPath => config_path('laravel-forecast.php')]);
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
