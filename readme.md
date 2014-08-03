[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nWidart/Laravel-forecast/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nWidart/Laravel-forecast/?branch=master)


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

Add the service provider in `app/config/app.php`

```php
'providers' => [
	...
	'Nwidart\LaravelForecast\LaravelForecastServiceProvider'
]


```


Add the Alias provider in `app/config/app.php`

```php
'aliases' => [
	...
	'Forecast'          => 'Nwidart\LaravelForecast\ForecastFacade',
]

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


## License (MIT)

Copyright (c) 2013 [Nicolas Widart](http://www.nicolaswidart.com) , n.widart@gmail.com

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.