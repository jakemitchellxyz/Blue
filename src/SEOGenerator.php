<?php

namespace MeestorHok\Blue;

use Artesaos\SEOTools\Facades\SEOTools as SEOTools;
use Request;
use File;

class SEOGenerator
{
    public $defaults;
    public static $favicons;
    
    public function __construct () {
        $this->defaults = [
            'title' => 'Home',
            'title-spacer' => ' &#8211; ',
            'title-description' => 'Laravel Blue',
            'keywords' => array_collapse([['home'], ['laravel', 'blue', 'cms', 'meestorhok']]),
            'description' => 'This amazing site was created by Laravel Blue!',
            'images' => [],
            'twitter' => '@BlueCMS',
            'copyright' => '© 2016 Laravel Blue',
            'robots' => 'index,follow',
            'icon_dir' => '/blue/img/icons',
            'colors' => [
                'safari_pinned' => '#151e4f',
                'ms_tile' => '#ffffff',
                'theme' => '#151e4f'
            ]
        ];
    }
    
    public function generateSEO (array $page)
    {
        SEOTools::metatags()
            ->setTitleDefault($page['title-description'])
            ->setTitleSeparator($page['title-spacer'])
            ->setTitle($page['title'])
            ->setDescription($page['description'])
            ->setCanonical(Request::url())
            ->addMeta('copyright', $page['copyright'])
            ->addMeta('robots', $page['robots'])
            ->addMeta('HandheldFriendly', 'True')
            ->addMeta('MobileOptimized', '320')
            ->addMeta('X-UA-Compatible', 'IE=edge', 'http-equiv')
            ->addMeta('viewport', 'width=device-width, initial-scale=1, shrink-to-fit=no');
        SEOTools::opengraph()
            ->setTitle($page['title'].$page['title-spacer'].$page['title-description'])
            ->setDescription($page['description'])
            ->setUrl(Request::url())
            ->addProperty('locale', 'en_US')
            ->addProperty('type', 'website');
        SEOTools::twitter()
            ->setSite($page['twitter'])
            ->setTitle($page['title'].$page['title-spacer'].$page['title-description'])
            ->setDescription($page['description'])
            ->setType('summary')
            ->setUrl(Request::url());
        foreach ($page['images'] as $image) {
            SEOTools::opengraph()->addImage(asset($image['uri']));
            SEOTools::twitter()->addImage(asset($image['uri']));
        }
        foreach ($page['keywords'] as $keyword) {
            SEOTools::metatags()->addKeyword($keyword);
        }
    }
    
    public function make (array $details, $view = null)
    {
        $this->defaults = array_replace($this->defaults, $details);
        
        $this->generateSEO($this->defaults);
        
        if (!is_null($view)) {
            return view($view);
        }
    }
    
    public function get ()
    {
        return str_replace(PHP_EOL, '', SEOTools::generate()) . $this->getFavicons();
    }
    
    public function setFavicons () 
    {
        $favicon_dir = insert_if_exists($this->defaults['icon_dir']);
        $colors = $this->defaults['colors'];
        self::$favicons =
                insert_if_exists (['60x60', '72x72', '114x114', '120x120', '152x152', '180x180'], function ($insert) use ($favicon_dir) {
                        return '<link rel="apple-touch-icon" sizes="' . $insert . '" href="' . asset($favicon_dir . '/apple-touch-icon-' . $insert . '.png').'">';
                    }, function ($insert) use ($favicon_dir) {
                        return File::exists(public_path($favicon_dir.'/apple-touch-icon-'.$insert.'.png'));
                    }) . 
                insert_if_exists (['16x16', '32x32', '96x96', '194x194'], function ($insert) use ($favicon_dir) {
                        return '<link rel="icon" type="image/png" href="' . asset($favicon_dir . '/favicon-' . $insert . '.png').'" sizes="'.$insert.'">';
                    }, function ($insert) use ($favicon_dir) {
                        return File::exists(public_path($favicon_dir.'/favicon-'.$insert.'.png'));
                    }) . 
                insert_if_exists (['192x192'], function ($insert) use ($favicon_dir) {
                        return '<link rel="icon" type="image/png" href="' . asset($favicon_dir . '/android-chrome-' . $insert . '.png').'" sizes="'.$insert.'">';
                    }, function ($insert) use ($favicon_dir) {
                        return File::exists(public_path($favicon_dir.'/android-chrome-'.$insert.'.png'));
                    }) . 
                insert_if_exists ($favicon_dir.'/manifest.json', function ($insert) {
                        return '<link rel="manifest" href="' . asset($insert) . '">';
                    }, function ($insert) {
                        return File::exists(public_path($insert));
                    }) . 
                insert_if_exists ($favicon_dir.'/safari-pinned-tab.svg', function ($insert) use ($colors) {
                        return '<link rel="mask-icon" href="'.asset($insert).'" color="' . insert_if_exists($colors['safari_pinned']) . '">';
                    }, function ($insert) {
                        return File::exists(public_path($insert));
                    }) . 
                insert_if_exists ($favicon_dir.'/favicon.ico', function ($insert) {
                        return '<link rel="shortcut icon" href="'.asset($insert).'">';
                    }, function ($insert) {
                        return File::exists(public_path($insert));
                    }) . 
                insert_if_exists ($favicon_dir.'/mstile-144x144.png', function ($insert) {
                        return '<meta name="msapplication-TileImage" content="'.asset($insert).'">';
                    }, function ($insert) {
                        return File::exists(public_path($insert));
                    }) . 
                insert_if_exists ($favicon_dir.'/browserconfig.xml', function ($insert) {
                        return '<meta name="msapplication-config" content="'.asset($insert).'">';
                    }, function ($insert) {
                        return File::exists(public_path($insert));
                    }) . 
                insert_if_exists ($colors['ms_tile'], function ($insert) {
                        return '<meta name="msapplication-TileColor" content="'.$insert.'">';
                    }) . 
                insert_if_exists ($colors['theme'], function ($insert) {
                        return '<meta name="theme-color" content="'.$insert.'">';
                    });
        return self::$favicons;
    }
    
    public function getFavicons () 
    {
        if (is_null(self::$favicons)) {
            return $this->setFavicons();
        }
        return self::$favicon;
    }
}