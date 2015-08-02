<?php namespace Nwidart\LaravelForecast;

use Illuminate\Support\Facades\Facade;

class ForecastFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Nwidart\ForecastPhp\Forecast';
    }
}
