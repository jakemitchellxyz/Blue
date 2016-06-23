<?php

namespace MeestorHok\Blue;

use Illuminate\Support\ServiceProvider;
use Form;

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
        
        Form::component('blueText', 'Blue::components.text', ['name', 'attributes' => []]);
        Form::component('blueEmail', 'Blue::components.email', ['name', 'attributes' => []]);
        Form::component('blueToggle', 'Blue::components.toggle', ['name', 'value' => null, 'checked' => false, 'attributes' => []]);
        Form::component('blueTextarea', 'Blue::components.textarea', ['name', 'attributes' => []]);
        Form::component('bluePassword', 'Blue::components.password', ['name', 'attributes' => []]);
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
        
        $this->app->router->middleware('siteExists', \MeestorHok\Blue\Http\Middleware\SiteExistsMiddleware::class);
        $this->app->router->middleware('siteDoesntExist', \MeestorHok\Blue\Http\Middleware\SiteDoesntExistMiddleware::class);
        $this->app->router->middleware('adminExists', \MeestorHok\Blue\Http\Middleware\AdminExistsMiddleware::class);
        $this->app->router->middleware('adminDoesntExist', \MeestorHok\Blue\Http\Middleware\AdminDoesntExistMiddleware::class);
        
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Html', 'Collective\Html\HtmlFacade');
        $loader->alias('Form', 'Collective\Html\FormFacade');
        $loader->alias('SEO', 'MeestorHok\Blue\Facades\SEOFacade');
    }
}
