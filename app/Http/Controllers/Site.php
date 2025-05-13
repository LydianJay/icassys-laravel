<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site extends Controller
{ 
    public function index(Request $request)
    {
        return view('pages.site.home');
    }

    public function dashboard(Request $request)
    {
        return view('pages.dashboard.dashboard');
    }
}
