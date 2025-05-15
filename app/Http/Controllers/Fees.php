<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Fees extends Controller
{



    public function fee_type() {


        return view('pages.fees.fee_type');
    }
}
