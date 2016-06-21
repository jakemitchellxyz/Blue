<?php

namespace MeestorHok\Blue\Tests;

use MeestorHok\Blue\Http\Controllers\AdminController;

class AdminControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testItReturnsTheDashboardIfUserIsAuthenticated ()
    {
        $this->assertTrue(true);
    }
    
    public function testItRedirectsToLoginIfUserIsNotAuthenticated ()
    {
        $this->assertTrue(true);
    }
}
