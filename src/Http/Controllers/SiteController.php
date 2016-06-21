<?php

namespace MeestorHok\Blue\Http\Controllers;
 
use Illuminate\Routing\Controller;
use Request;
use SEO;

class SiteController extends Controller
{
    public function showCreateForm () 
    {
        return SEO::make([
            'title' => 'New Site',
            'description' => 'You currently don\'t have a site! Create one now to get started!'
        ], 'Blue::auth.new-site');
    }
}