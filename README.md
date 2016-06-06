# :package_name

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Install

Via Composer

``` bash
$ composer require MeestorHok/Blue
```

###Update the Laravel Framework

Add the following to config/app.php

``` php
'providers' => [
    MeestorHok\Blue\BlueServiceProvider::class,
    Artesaos\SEOTools\Providers\SEOToolsServiceProvider::class,
    Collective\Html\HtmlServiceProvider::class
],
'aliases' => [
    'Html' => Collective\Html\HtmlFacade::class,
    'Form' => Collective\Html\FormFacade::class,
    'SEO' => Artesaos\SEOTools\Facades\SEOTools::class
]
```

## Usage

TODO