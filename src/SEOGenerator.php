<?php

namespace MeestorHok\Blue;

use Artesaos\SEOTools\Facades\SEOTools as SEO;
use Request;

class SEOGenerator
{
    // DIR for icons
    const FAVICONS = '/img/icons';
    
    public static function generateSEO (array $page)
    {
        SEO::metatags()
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
        SEO::opengraph()
            ->setTitle($page['title'] . $page['title-spacer'] . $page['title-description'])
            ->setDescription($page['description'])
            ->setUrl(Request::url())
            ->addProperty('locale', 'en_US')
            ->addProperty('type', 'website');
        SEO::twitter()
            ->setSite($page['twitter'])
            ->setTitle($page['title'] . $page['title-spacer'] . $page['title-description'])
            ->setDescription($page['description'])
            ->setType('summary')
            ->setUrl(Request::url());
        foreach ($page['images'] as $image) {
            SEO::opengraph()->addImage(asset($image['uri']));
            SEO::twitter()->addImage(asset($image['uri']));
        }
        foreach ($page['keywords'] as $keyword) {
            SEO::metatags()->addKeyword($keyword);
        }
    }
    
    public static function favicon () {
        $colors = [
            'safari-pinned' => '#5bbad5',
            'ms-tile' => '#da532c',
            'theme' => '#ec500e'
        ];
        
        return
            '<link rel="apple-touch-icon" sizes="57x57" href="' . asset(self::FAVICONS . '/apple-touch-icon-57x57.png') . '">' .
            '<link rel="apple-touch-icon" sizes="60x60" href="' . asset(self::FAVICONS . '/apple-touch-icon-60x60.png') . '">' .
            '<link rel="apple-touch-icon" sizes="72x72" href="' . asset(self::FAVICONS . '/apple-touch-icon-72x72.png') . '">' .
            '<link rel="apple-touch-icon" sizes="76x76" href="' . asset(self::FAVICONS . '/apple-touch-icon-76x76.png') . '">' .
            '<link rel="apple-touch-icon" sizes="114x114" href="' . asset(self::FAVICONS . '/apple-touch-icon-114x114.png') . '">' .
            '<link rel="apple-touch-icon" sizes="120x120" href="' . asset(self::FAVICONS . '/apple-touch-icon-120x120.png') . '">' .
            '<link rel="apple-touch-icon" sizes="144x144" href="' . asset(self::FAVICONS . '/apple-touch-icon-144x144.png') . '">' .
            '<link rel="apple-touch-icon" sizes="152x152" href="' . asset(self::FAVICONS . '/apple-touch-icon-152x152.png') . '">' .
            '<link rel="apple-touch-icon" sizes="180x180" href="' . asset(self::FAVICONS . '/apple-touch-icon-180x180.png') . '">' .
            '<link rel="icon" type="image/png" href="' . asset(self::FAVICONS . '/favicon-16x16.png') . '" sizes="16x16">' .
            '<link rel="icon" type="image/png" href="' . asset(self::FAVICONS . '/favicon-32x32.png') . '" sizes="32x32">' .
            '<link rel="icon" type="image/png" href="' . asset(self::FAVICONS . '/favicon-96x96.png') . '" sizes="96x96">' .
            '<link rel="icon" type="image/png" href="' . asset(self::FAVICONS . '/favicon-194x194.png') . '" sizes="194x194">' .
            '<link rel="icon" type="image/png" href="' . asset(self::FAVICONS . '/android-chrome-192x192.png') . '" sizes="192x192">' .
            '<link rel="manifest" href="' . asset(self::FAVICONS . '/manifest.json') . '">' .
            '<link rel="mask-icon" href="' . asset(self::FAVICONS . '/safari-pinned-tab.svg') . '" color="' . $colors['safari-pinned'] . '">' .
            '<link rel="shortcut icon" href="' . asset(self::FAVICONS . '/favicon.ico') . '">' .
            '<meta name="msapplication-TileColor" content="' . $colors['ms-tile'] . '">' .
            '<meta name="msapplication-TileImage" content="' . asset(self::FAVICONS . '/mstile-144x144.png') . '">' .
            '<meta name="msapplication-config" content="' . asset(self::FAVICONS . '/browserconfig.xml') . '">' .
            '<meta name="theme-color" content="' . $colors['theme'] . '">';
    }
    
    public static function make (array $details, $view = null)
    {
        $defaults = [
            'title' => 'Home',
            'title-spacer' => ' &#8211; ',
            'title-description' => 'Laravel Blue',
            'keywords' => array_collapse([['home'], ['laravel', 'blue', 'cms', 'meestorhok']]),
            'description' => 'This amazing site was created by Laravel Blue!',
            'images' => [],
            'twitter' => '@BlueCMS',
            'copyright' => '© 2016 Laravel Blue',
            'favicons' => '/img/icons',
            'robots' => 'index,follow'
        ];
        
        $data = array_replace($defaults, $details);
        
        self::generateSEO($data);
        
        if (!is_null($view)) {
            return view($view)->with('seo', self::get());
        }
    }
    
    public static function get ()
    {
        return str_replace(PHP_EOL, '', SEO::generate()) . self::favicon();
    }
}