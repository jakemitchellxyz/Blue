<?php

namespace MeestorHok\Blue\Http\Controllers;
 
use Illuminate\Routing\Controller;
use Request;
use SEO;

class PagesController extends Controller
{
    public function page ($page = null) {
        if (is_null($page)) {
            return SEO::make([], 'Blue::home');
        }
        return '<h1>'.$page.'</h1>';
    }
}