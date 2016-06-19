<?php

namespace MeestorHok\Blue\Http\Controllers;
 
use Illuminate\Routing\Controller;
use Request;

//use MeestorHok\Blue\Models\Site;
//use MeestorHok\Blue\Models\Page as Page;
use MeestorHok\Blue\SEOGenerator as SEO;

class PagesController extends Controller
{
    public function page ($page = null) {
        if (is_null($page)) {
            return SEO::make([], 'Blue::home');
        }
        return '<h1>'.$page.'</h1>';
    }
}