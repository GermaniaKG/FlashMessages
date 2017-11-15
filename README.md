# Germania KG · FlashMessages

**Pimple Service Provider for [Slim Framework flash messages](https://github.com/slimphp/Slim-Flash)**


## Installation

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

Either copy `phpunit.xml.dist` to `phpunit.xml` and adapt to your needs, or leave as is. 
Run [PhpUnit](https://phpunit.de/) like this:

```bash
$ vendor/bin/phpunit
```
