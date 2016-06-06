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
        if(!$this->app->routesAreCached()) {
            require __DIR__.'/routes.php';
        }
        
        $this->loadViewsFrom(base_path('resources/views'), 'Blue');
        
        $this->publishes([
            __DIR__.'/resources/views' => base_path('resources/views');
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}