<?php

namespace MeestorHok\Blue\Http\Controllers;
 
use Illuminate\Routing\Controller;
use SEO;
use Request;

//use MeestorHok\Blue\Models\Site;
//use MeestorHok\Blue\Models\Page as Page;

class PagesController extends Controller
{
    private function generateSEO ($site, $page) {
        SEO::metatags()
            ->setTitleDefault($site['title'])
            ->setTitleSeparator(' - ')
            ->setTitle($page['title'])
            ->setDescription($page['description'])
            ->setCanonical(Request::url())
            ->addMeta('robots', 'index,follow')
            ->addMeta('X-UA-Compatible', 'IE=edge', 'http-equiv');
        SEO::opengraph()
            ->setTitle($site['title'])
            ->setDescription($page['description'])
            ->setUrl(Request::url())
            ->addProperty('locale', 'en_US')
            ->addProperty('type', 'website');
        SEO::twitter()
            ->setSite($site['twitter'])
            ->setTitle($site['title'])
            ->setDescription($page['description'])
            ->setType('summary')
            ->setUrl(Request::url());
        if ($site['isMobileOptimized']) {
            SEO::metatags()
                ->addMeta('HandheldFriendly', 'True')
                ->addMeta('MobileOptimized', '320')
                ->addMeta('viewport', 'width=device-width, initial-scale=1, shrink-to-fit=no');
        }
        foreach ($page['images']['heroes'] as $image) {
            SEO::opengraph()->addImage(asset($image['uri']));
            SEO::twitter()->addImage(asset($image['uri']));
        }
        foreach ($page['keywords'] as $keyword) {
            SEO::metatags()->addKeyword($keyword);
        }
    }
    
    public function home () {
        $site = [
            'title' => 'Blue CMS',
            'twitter' => '@BlueCMS',
            'isMobileOptimized' => true
        ];
        $page = [
            'title' => 'Home',
            'description' => 'Welcome to Blue CMS!',
            'keywords' => [
                'blue',
                'cms',
                'seo'
            ],
            'images' => [
                'heroes' => [
                    [
                        'uri' => 'uploads/adfieuenfvef.png'
                    ],
                    [
                        'uri' => 'uploads/wjqriubasdad.png'
                    ]
                ]
            ]
        ];
        
        $this->generateSEO($site, $page);
        
        return view('Blue::home');
    }
    
    public function page ($page = null) {
        if (is_null($page)) {
            return $this->home();
        }
        return '<h1>'.$page.'</h1>';
    }
}