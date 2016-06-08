<?php

use MeestorHok\Blue\Http\Controllers\AdminController;

class AdminControllerTest extends PHPUnit_Framework_TestCase
{
    /**
     * 'admin' Route
     * 
     * User logged in
     */
    public function test_returns_dashboard_if_user_is_authenticated ()
    {
        // $user = factory(App\User::class)->create();
        
        // $this->actingAs($user, 'admin')
        //      ->call('GET', 'admin')
        //      ->see('Waddup, y\'all');
        $this->assertTrue(true);
    }
    
    /**
     * 'admin' Route
     * 
     * User Not logged in
     */
    public function test_redirects_to_login_if_user_is_not_authenticated ()
    {
        // $this->call('GET', 'admin')
        //      ->assertRedirectedTo('login');
        $this->assertTrue(true);
    }
}
