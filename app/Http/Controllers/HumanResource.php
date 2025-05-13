<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\Role;
class HumanResource extends Controller
{


    public function index() {
        


        

    }


    public function department() {

        $data['departments'] = Department::all();

        return view('pages.human_resource.department', $data);
    }


    public function designation(Request $request) {

        $search = $request->input('search');

        if($search != null && $search != '') {
            $data['designations'] = Role::where('role_name', 'LIKE', '%' . $search . '%')->get();
        } else {
            $data['designations'] = Role::all();
        }


        return view('pages.human_resource.designation', $data);
    }


    public function designation_create(Request $request) {

        // check for role
        $data = $request->input('role_name');

        
        Role::create(['role_name' => $data]);

        return redirect()->route('designation')->with('status',['alert' => 'alert-success', 'msg' => 'Role created!'] );

    }

}
