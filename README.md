# Blue CMS

## Still Under Initial Development

[![Build Status][ico-build]][link-travis]
[![Quality Score][ico-scrutinizer]][link-scrutinizer]
[![Latest Unstable Version][ico-unstable]][link-packagist]
[![License][ico-license]][link-license]
[![Total Downloads][ico-downloads]][link-packagist]
<!--[![Latest Stable Version][ico-stable]][link-packagist]-->

Premier SEO driven CMS powered by Laravel

## Install

Via Composer

``` bash
$ composer require meestorhok/blue
```

###Update the Laravel Framework

Add the following provider to config/app.php

``` php
'providers' => [
    MeestorHok\Blue\BlueServiceProvider::class
]
```

then, run these cli commands to setup the database and install resource files

``` bash
$ php artisan vendor:publish meestorhok/blue --force
$ php artisan migrate
```

*Side Note*: The `--force` tag is required to install the routes for the application.

## Usage

TODO


## Security

If you discover any security related issues, please email jake@jmitchell.co instead of using the issue tracker.

## Credits

- [Jake Mitchell][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File][link-license] for more information.

[ico-stable]: https://poser.pugx.org/meestorhok/blue/v/stable
[ico-unstable]: https://poser.pugx.org/meestorhok/blue/v/unstable
[ico-downloads]: https://poser.pugx.org/meestorhok/blue/downloads
[ico-license]: https://poser.pugx.org/meestorhok/blue/license
[ico-scrutinizer]: https://scrutinizer-ci.com/g/MeestorHok/Blue/badges/quality-score.png?b=master
[ico-build]: https://travis-ci.org/MeestorHok/Blue.svg

[link-travis]: https://travis-ci.org/MeestorHok/Blue
[link-packagist]: https://packagist.org/packages/meestorhok/blue
[link-scrutinizer]: https://scrutinizer-ci.com/g/meestorhok/blue
[link-license]: ./LICENSE.md
[link-author]: https://github.com/MeestorHok
[link-contributors]: ../../contributors
