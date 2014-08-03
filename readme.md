# Laravel-Forecast

Laravel-forecast provides a service provider and a facade arround the [Forecast-php](https://github.com/guhelski/forecast-php) wrapper.

## Installation

Add the following in you [composer](http://getcomposer.org).json file:

```json
{
    "require": {
        "widart/laravel-forecast": "dev-master"
    }
}
```

**Publish the configuration file and add your [forecast API key](https://developer.forecast.io/)**

```
$ php artisan config:publish nwidart/laravel-forecast
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