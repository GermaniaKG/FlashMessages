# Germania KG · FlashMessages

**Pimple Service Provider for [Slim Framework flash messages](https://github.com/slimphp/Slim-Flash)**

[![Packagist](https://img.shields.io/packagist/v/germania-kg/flashmessages.svg?style=flat)](https://packagist.org/packages/germania-kg/flashmessages)
[![PHP version](https://img.shields.io/packagist/php-v/germania-kg/flashmessages.svg)](https://packagist.org/packages/germania-kg/flashmessages)
[![Build Status](https://img.shields.io/travis/GermaniaKG/FlashMessages.svg?label=Travis%20CI)](https://travis-ci.org/GermaniaKG/FlashMessages)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/GermaniaKG/FlashMessages/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/FlashMessages/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/GermaniaKG/FlashMessages/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/FlashMessages/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/GermaniaKG/FlashMessages/badges/build.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/FlashMessages/build-status/master)


## Installation with Composer

```bash
$ composer require germania-kg/flashmessages
```

Alternatively, add this package directly to your *composer.json:*

```json
"require": {
    "germania-kg/flashmessages": "^1.0"
}
```


## Usage


```php
<?php
use Pimple\Container;
use Slim\Flash\Messages;
use Germania\FlashMessages\FlashMessagesServiceProvider;


// Messages object is optional
$flash_services = new FlashMessagesServiceProvider;
$flash_services = new FlashMessagesServiceProvider( new Messages );

// Setup Pimple container
$container = new Container;
$container->register( $flash_services );
```


## Development

```bash
$ git clone https://github.com/GermaniaKG/FlashMessages.git
$ cd FlashMessages
$ composer install
```

## Unit tests

Either copy `phpunit.xml.dist` to `phpunit.xml` and adapt to your needs, or leave as is. Run [PhpUnit](https://phpunit.de/) test or composer scripts like this:

```bash
$ composer test
# or
$ vendor/bin/phpunit
```

