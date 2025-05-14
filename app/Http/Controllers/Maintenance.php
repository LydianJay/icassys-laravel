<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Maintenance extends Controller
{
    
    public function under_dev() {

        return view('pages.maintenance.under_dev');
    }
}
