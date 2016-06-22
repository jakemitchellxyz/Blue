<?php

namespace MeestorHok\Blue\Http\Controllers;
 
use MeestorHok\Blue\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    
    public function createSite (Request $request)
    {
        // 'title', 'social_links', 'description', 'slogan',
        // 'keywords', 'copyright', 'is_public_site', 'logo'
        $this->validate($request, [
            'siteName' => 'required|unique:sites,title|max:100',
            'slogan' => 'max:155',
            'description' => 'required|max:255',
            'copyright' => 'max:100'
        ], [
            'siteName.required' => 'Your site must have a name!',
            'siteName.unique' => 'You already own a site by that name.',
            'description.required' => 'Tell us a little about the site.'
        ]);
        
        Site::create([
            'title' => $request->siteName,
            'slogan' => $request->slogan,
            'description' => $request->description,
            'copyright' => $request->copyright,
            'is_public_site' => 1,
            'social_links' => json_encode($socialLinks),
            'keywords' => implode(',', $keywords)
        ]);
        
        return redirect()->route('create.admin');
    }
}