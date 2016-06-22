<?php

namespace MeestorHok\Blue;

use \Illuminate\Database\Eloquent\Model as Model;

class Site extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'social_links', 'description', 'slogan',
        'keywords', 'copyright', 'is_public_site'
    ];
}
