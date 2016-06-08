<?php

namespace MeestorHok\Blue\Http\Controllers;
 
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function __construct () {
        $this->middleware('auth');
    }
 
    public function index() {
        return view('Blue::admin.dashboard');
    }
}