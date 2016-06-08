<?php

function controller($controller) {
    return 'MeestorHok\\Blue\\Http\\Controllers\\'.$controller;
}

Route::get('/', controller('PagesController@home'));

Route::resource('admin', controller('AdminController'));

Route::get('/{page}', controller('PagesController@page'));