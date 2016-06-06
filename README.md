# Blue CMS

Premier SEO driven CMS powered by Laravel

## Install

Via Composer

``` php
"MeestorHok/Blue" : "0.1.*"
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
