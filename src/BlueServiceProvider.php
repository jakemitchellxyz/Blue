<?php

namespace MeestorHok\Blue;

use Illuminate\Support\ServiceProvider;

class BlueServiceProvider extends ServiceProvider
{
    
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->register('Collective\Html\HtmlServiceProvider');
        $this->app->register('Artesaos\SEOTools\Providers\SEOToolsServiceProvider');
        
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Html', 'Collective\Html\HtmlFacade');
        $loader->alias('Form', 'Collective\Html\FormFacade');
        
        $this->loadViewsFrom(__DIR__.'/resources/views', 'Blue');
        
        $this->publishes([
            __DIR__.'/resources/lib' => public_path('lib'),
        ], 'public');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/Http/routes.php';
    }
}
