<?php

namespace MeestorHok\Blue\Http\Controllers;
 
use Illuminate\Routing\Controller;
use Auth;

class AdminController extends Controller
{
    public function index () {
        return redirect('admin/dashboard');
    }
    
    public function showDashboard () {
        return view('Blue::admin.dashboard');
    }
}