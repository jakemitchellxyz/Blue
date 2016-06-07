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
        
        // $this->publishes([
        //     __DIR__.'/migrations' => database_path('migrations')
        // ], 'migrations');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/Http/routes.php';
        $this->app->make(__NAMESPACE__.'\Http\Controllers\AdminController');
    }
}