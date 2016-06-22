<?php

namespace MeestorHok\Blue\Http\Controllers;
 
use MeestorHok\Blue\Http\Controllers\Controller;
use Auth;

class AdminController extends Controller
{
    public function __construct () {
        $this->middleware('auth');
    }
    
    public function index () {
        return redirect('admin/dashboard');
    }
    
    public function showDashboard () {
        return view('Blue::admin.dashboard');
    }
}