<?php

function controller($controller) {
    return 'MeestorHok\\Blue\\Http\\Controllers\\'.$controller;
}

Route::resource('admin', controller('AdminController'));