[![Latest Version](https://img.shields.io/github/release/nWidart/Laravel-forecast.svg?style=flat-square)](https://github.com/nWidart/Laravel-forecast/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/f554481b-7cd2-4239-a07b-da975dc27688.svg)](https://insight.sensiolabs.com/projects/f554481b-7cd2-4239-a07b-da975dc27688)
[![Quality Score](https://img.shields.io/scrutinizer/g/nWidart/Laravel-forecast.svg?style=flat-square)](https://scrutinizer-ci.com/g/nWidart/Laravel-forecast)
[![Total Downloads](https://img.shields.io/packagist/dt/nwidart/laravel-forecast.svg?style=flat-square)](https://packagist.org/packages/nwidart/laravel-forecast)


**Laravel 5 compatible package**

| Laravel version  | Package version |
| ---------------- | --------------- |
| ~4.2  | ~1.2  |
| ~5.1  | ~2.0   |

# Laravel-Forecast

Laravel-forecast provides a service provider and a facade around the [Forecast-php]((https://github.com/nWidart/forecast-php) wrapper.

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
```

### Provide more options

```php

<?php

// Get the forecast at a given time
dd(Forecast::get(('37.8267','-122.423', '2013-05-06T12:00:00-0400'));

// Use some optional query parameters
dd(Forecast::get((
    '37.8267',
    '-122.423',
    null,
    array(
        'units' => 'si',
        'exclude' => 'flags'
        )
    )
);


```

You can also inject the `Forecast\Forecast` class into your contructror.

``` php

 /**
 * @var \Forecast\Forecast
 */
private $forecast;

public function __construct(\Forecast\Forecast $forecast)
{
    $this->forecast = $forecast;
}

public function doSomething()
{
    $weather = $this->forecast->get($lat, $lon);
}
```

## [License (MIT)](LICENSE.md)

