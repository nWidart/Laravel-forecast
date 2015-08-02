[![Latest Version](https://img.shields.io/github/release/nWidart/Laravel-forecast.svg?style=flat-square)](https://github.com/nWidart/Laravel-forecast/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/f554481b-7cd2-4239-a07b-da975dc27688.svg)](https://insight.sensiolabs.com/projects/f554481b-7cd2-4239-a07b-da975dc27688)
[![Quality Score](https://img.shields.io/scrutinizer/g/nWidart/Laravel-forecast.svg?style=flat-square)](https://scrutinizer-ci.com/g/nWidart/Laravel-forecast)
[![Total Downloads](https://img.shields.io/packagist/dt/nwidart/laravel-forecast.svg?style=flat-square)](https://packagist.org/packages/nwidart/laravel-forecast)


**Laravel 5 compatible package**

| Laravel version  | Package version |
| ---------------- | --------------- |
| ~4.2  | ~1.2  |
| ~5.1  | ~2.1   |

# Laravel-Forecast

Laravel-forecast provides a service provider and a facade around the [Forecast-php](https://github.com/nWidart/forecast-php) wrapper.

Want to use this as a standalone package ? Checkout the [Forecast-php](https://github.com/nWidart/forecast-php) API wrapper.


## Installation

``` bash
$ composer require nwidart/laravel-forecast
```

Add the service provider in `app/config/app.php`

```php
'providers' => [
	...
	Nwidart\LaravelForecast\LaravelForecastServiceProvider::class
]
```


Add the Alias provider in `app/config/app.php`

```php
'aliases' => [
	...
	'Forecast' => Nwidart\LaravelForecast\ForecastFacade::class,
]
```


**Publish the configuration file and add your [forecast API key](https://developer.forecast.io/)**

```
$ php artisan vendor:publish --provider="Nwidart\LaravelForecast\LaravelForecastServiceProvider"
```

## Usage

### Base usage

```php
<?php

Forecast::get('37.8267','-122.423');

// Get the forecast at a given time
Forecast::get(('37.8267','-122.423', '2013-05-06T12:00:00-0400')
```

### Setting global options for every request

In the settings you can add global options that will have used on every request made to Forecast.io. You can add this in the `options` key of the settings file.
 
 For instance if you want temperature in Celsius:
 
 ``` php
'options' => [
    'units' => 'si',
],
```

For more details and all available options check the [official documentation](https://developer.forecast.io/docs/v2).

### Alternative method: dependency injection

You can also inject the `Nwidart\ForecastPhp\Forecast` class into your constructor.

``` php

 /**
 * @var \Nwidart\ForecastPhp\Forecast
 */
private $forecast;

public function __construct(\Nwidart\ForecastPhp\Forecast $forecast)
{
    $this->forecast = $forecast;
}

public function doSomething()
{
    $weather = $this->forecast->get($lat, $lon);
}
```

## [License (MIT)](LICENSE.md)

