<?php

use MeestorHok\Blue\Http\Controllers\AdminController;
//use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteCollection;
use Illuminate\Routing\UrlGenerator;


class AdminControllerTest extends PHPUnit_Framework_TestCase
{
    
    /** 
     * Setup the test environment. 
     */ 
    public function setUp() 
    { 
        $this->urlGenerator = new UrlGenerator(new RouteCollection(), Request::create('/', 'GET'));
    }
    
    public function test_returns_dashboard_if_user_is_authenticated ()
    {
        // $user = factory(App\User::class)->create();
        
        // $this->actingAs($user, 'admin')
        //      ->call('GET', 'admin')
        //      ->see('Waddup, y\'all');
        // $this->assertTrue(true);
        $request = $this->urlGenerator->to('admin')->see('Waddup, y\'all');
        $this->assertFalse($request);
    }
    
    public function test_redirects_to_login_if_user_is_not_authenticated ()
    {
        $request = $this->urlGenerator->to('admin')->assertRedirectedTo('login');
        //$this->assertTrue(true);
    }
}
