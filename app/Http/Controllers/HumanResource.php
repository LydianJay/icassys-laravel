<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;

class HumanResource extends Controller
{


    public function index() {
        


        

    }


    public function department() {

        $data['departments'] = Department::all();

        return view('pages.human_resource.department', $data);
    }
}
