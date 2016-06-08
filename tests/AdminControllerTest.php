<?php

use MeestorHok\Blue\Http\Controllers\AdminController;

class AdminControllerTest extends \Orchestra\Testbench\TestCase
{
    /**
     * 'admin' Route
     * 
     * User logged in
     */
    public function test_returns_dashboard_if_user_is_authenticated ()
    {
        $user = factory(App\User::class)->create();
        
        $this->actingAs($user, 'admin')
             ->call('GET', 'admin')
             ->see('Waddup, y\'all');
    }
    
    /**
     * 'admin' Route
     * 
     * User Not logged in
     */
    public function test_redirects_to_login_if_user_is_not_authenticated ()
    {
        $this->call('GET', 'admin')
             ->assertRedirectedTo('login');
    }
}
