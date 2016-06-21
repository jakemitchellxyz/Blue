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
        $this->loadViewsFrom(__DIR__.'/resources/views', 'Blue');
        
        $this->publishes([
            __DIR__.'/resources/public' => public_path('blue'),
        ], 'frontend');
        
        $this->publishes([
            __DIR__.'/Migrations' => database_path('migrations'),
        ], 'migrations');
        
        $this->publishes([
            __DIR__.'/Http/routes.blue.php' => app_path('Http/routes.blue.php'),
            __DIR__.'/Http/routes.php' => app_path('Http/routes.php'),
        ], 'routes');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('SEO', function() {
            return new \MeestorHok\Blue\SEOGenerator;
        });
        
        require app_path('Http/routes.blue.php');
        require_once(__DIR__.'/helpers.php');
        
        $this->app->register('Collective\Html\HtmlServiceProvider');
        $this->app->register('Artesaos\SEOTools\Providers\SEOToolsServiceProvider');
        
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Html', 'Collective\Html\HtmlFacade');
        $loader->alias('Form', 'Collective\Html\FormFacade');
        $loader->alias('SEO', 'MeestorHok\Blue\Facades\SEOFacade');
    }
}
