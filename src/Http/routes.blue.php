<?php

Route::group(['namespace' => 'MeestorHok\\Blue\\Http\\Controllers', 'middleware' => 'web'], function()
{
    Route::group(['middleware' => 'siteDoesntExist'], function () 
    { // if the user hasn't created a site yet
        Route::get('new', 'SiteController@showCreateForm');
        Route::post('new', 'SiteController@createSite')->name('create.site');
    });
    
    Route::group(['middleware' => 'siteExists'], function () 
    { // At least one site exists
        Route::group(['middleware' => 'adminDoesntExist'], function () 
        { // if no admin exists yet
            Route::get('admin/new', 'SiteController@showAdminForm');
            Route::post('admin/new', 'SiteController@createAdmin')->name('create.admin');
        });
        
        Route::group(['middleware' => 'adminExists'], function ()
        { // At least one admin exists
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
});