<?php

Route::group(['namespace' => '\\MeestorHok\\Blue\\Http\\Controllers'], function()
{
    Route::group(['prefix' => 'admin'/* , 'middleware' => 'auth' */], function () 
    {
        Route::get('/', 'AdminController@index');
        Route::get('dashboard', 'AdminController@showDashboard');
    });
    
    Route::group(['middleware' => 'guest'], function () 
    {
        Route::get('login', 'AuthController@showLoginForm');
        Route::post('login', 'AuthController@postLoginForm');
        
        Route::get('register', 'AuthController@showRegisterForm');
        Route::post('register', 'AuthController@postRegisterForm');
    });
    
    Route::get('/{page?}', 'PagesController@page');
});