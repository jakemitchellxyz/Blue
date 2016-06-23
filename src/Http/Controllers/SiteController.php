<?php

namespace MeestorHok\Blue\Http\Controllers;
 
use MeestorHok\Blue\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SEO;
use MeestorHok\Blue\Site;

class SiteController extends Controller
{
    public function showCreateForm () 
    {
        return SEO::make([
            'title' => 'Create Site',
            'description' => 'You currently don\'t have a site! Create one now to get started!'
        ], 'Blue::auth.new-site');
    }
    
    public function createSite (Request $request)
    {
        $this->validate($request, [
            'siteName' => 'required|unique:sites,title|max:100',
            'slogan' => 'max:155',
            'description' => 'required|max:255',
            'keywords' => 'max:255',
            'copyright' => 'max:100'
        ], [
            'siteName.required' => 'Your site must have a name!',
            'siteName.unique' => 'You already own a site by that name.',
            'description.required' => 'Tell us a little about the site.'
        ]);
        
        $socialLinks = [
            'facebook'  => insert_if_exists($request->useFacebook, $request->linkFacebook),
            'twitter'   => insert_if_exists($request->useTwitter, $request->linkTwitter),
            'instagram' => insert_if_exists($request->useInstagram, $request->linkInstagram),
            'pinterest' => insert_if_exists($request->usePinterest, $request->linkPinterest),
            'youtube'   => insert_if_exists($request->useYoutube, $request->linkYoutube),
        ];
        
        $data = [
            'title' => $request->siteName,
            'slogan' => $request->slogan,
            'description' => $request->description,
            'copyright' => $request->copyright,
            'favicons' => SEO::generateFavicons(),
            'is_public_site' => is_null($request->hideFromSearchEngines),
            'social_links' => json_encode($socialLinks),
            'keywords' => $request->keywords
        ];
        
        Site::create($data);
        
        return redirect()->route('create.admin');
    }
    
    public function showAdminForm ()
    {
        return SEO::make([
            'title' => 'Create Admin',
            'description' => 'Register as the first admin on your new site!'
        ], 'Blue::auth.new-admin');
    }
}