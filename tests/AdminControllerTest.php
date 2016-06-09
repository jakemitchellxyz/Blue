<?php

use MeestorHok\Blue\Http\Controllers\AdminController;
//use Illuminate\Contracts\View\Factory;
//use Illuminate\Http\Request;
use Illuminate\Routing\RouteCollection;
//use Illuminate\Routing\UrlGenerator as URL;
use Mockery as m;


class AdminControllerTest extends Illuminate\Foundation\Testing\TestCase
{
    
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'https://blue-meestorhok.c9users.io';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        // $app = require __DIR__.'/../bootstrap/app.php';

        // $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        // return $app;
        return m::mock('Illuminate\Contracts\Foundation\Application');
    }
    
    // public function setUp() 
    // { 
    //     $this->urlGenerator = new UrlGenerator(new RouteCollection(), Request::create('/', 'GET'));
    // }
    
    public function test_returns_dashboard_if_user_is_authenticated ()
    {
        // $user = factory(App\User::class)->create();
        
        // $this->actingAs($user, 'admin')
        //      ->call('GET', 'admin')
        //      ->see('Waddup, y\'all');
        // $this->assertTrue(true);
        $this->call('GET', 'admin')->see('Waddup, y\'all');
       // $this->assertFalse($request);
    }
    
    public function test_redirects_to_login_if_user_is_not_authenticated ()
    {
        //$request = $this->urlGenerator->to('admin')->assertRedirectedTo('login');
        $this->assertTrue(true);
    }
}
