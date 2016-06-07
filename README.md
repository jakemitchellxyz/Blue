# Blue CMS

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Premier SEO driven CMS powered by Laravel

## Install

Via Composer

``` bash
$ composer require meestorhok/blue
```

###Update the Laravel Framework

Add the following to config/app.php

``` php
'providers' => [
    Collective\Html\HtmlServiceProvider::class, // HTML resource *required
    Artesaos\SEOTools\Providers\SEOToolsServiceProvider::class, // SEO resource *required
    MeestorHok\Blue\BlueServiceProvider::class // Blue CMS
],
'aliases' => [
    'Html' => Collective\Html\HtmlFacade::class, // HTML facade *required
    'Form' => Collective\Html\FormFacade::class, // HTML Form facade *required
    'SEO' => Artesaos\SEOTools\Facades\SEOTools::class // SEO facade *required
]
```

then, run these cli commands to setup the database

``` bash
$ php artisan vendor:publish
$ php artisan migrate
```

## Usage

TODO


## Security

If you discover any security related issues, please email jake@jmitchell.co instead of using the issue tracker.

## Credits

- [Jake Mitchell][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/meestorhok/blue.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/meestorhok/blue/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/meestorhok/blue.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/meestorhok/blue.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/meestorhok/blue.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/meestorhok/blue
[link-travis]: https://travis-ci.org/meestorhok/blue
[link-scrutinizer]: https://scrutinizer-ci.com/g/meestorhok/blue/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/meestorhok/blue
[link-downloads]: https://packagist.org/packages/meestorhok/blue
[link-author]: https://github.com/MeestorHok
[link-contributors]: ../../contributors
