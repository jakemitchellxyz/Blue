<?php

namespace MeestorHok\Blue\Http\Controllers;

use Illuminate\Routing\Controller;
use Auth;

class AuthController extends Controller
{
    public function __construct () {
        $this->middleware('guest');
    }
    
    public function showLoginForm () {
        return view('Blue::auth.login');
    }
    
    public function postLoginForm () {
        return 'Posted!';
    }
    
    public function showRegisterForm () {
        return view('Blue::auth.register');
    }
    
    public function postRegisterForm () {
        return 'Posted!';
    }
}