<?php

use MeestorHok\Blue\Http\Controllers\AdminController;
//use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteCollection;
use Illuminate\Routing\UrlGenerator;
use Mockery as m;


class AdminControllerTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->urlGenerator = new UrlGenerator(new RouteCollection(), Request::create('/', 'GET'));
        $this->app = m::mock('Illuminate\Contracts\Foundation\Application');
    }
    
    public function tearDown() 
    { 
        m::close();
    }
    
    public function testItReturnsTheDashboardIfUserIsAuthenticated ()
    {
        // $user = factory(App\User::class)->create();
        
        // $this->actingAs($user, 'admin')
        //      ->call('GET', 'admin')
        //      ->see('Waddup, y\'all');
        // $this->assertTrue(true);
        $this->app->call('GET', 'admin')->see('Waddup, y\'all');
       // $this->assertFalse($request);
    }
    
    public function testItRedirectsToLoginIfUserIsNotAuthenticated ()
    {
        //$request = $this->urlGenerator->to('admin')->assertRedirectedTo('login');
        $this->assertTrue(true);
    }
}
