<?php

use MeestorHok\Blue\Http\Middleware\SiteExistsMiddleware;
use MeestorHok\Blue\Http\Middleware\SiteDoesntExistMiddleware;

Route::group(['namespace' => 'MeestorHok\\Blue\\Http\\Controllers', 'middleware' => 'web'], function()
{
    Route::group(['middleware' => SiteDoesntExistMiddleware::class], function () 
    { // if the user hasn't created a site yet
        Route::get('new', 'SiteController@showCreateForm');
    });
    
    Route::group(['middleware' => SiteExistsMiddleware::class], function () 
    { // At least one site exists
        Route::group(['prefix' => 'admin'], function () 
        {
            Route::get('/', 'AdminController@index');
            Route::get('dashboard', 'AdminController@showDashboard');
        });
        
        Route::get('login', 'AuthController@showLoginForm');
        Route::post('login', 'AuthController@postLoginForm');
        
        Route::get('register', 'AuthController@showRegisterForm');
        Route::post('register', 'AuthController@postRegisterForm');
        
        Route::get('/{page?}', 'PagesController@page');
    });
});