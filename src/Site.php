<?php

namespace MeestorHok\Blue\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Site extends Eloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'twitter', 'isMobileOptimized',
        'description', 'base_url', 'keywords',
    ];
}
