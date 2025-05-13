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
        $id   = $request->input('id');
        if($search != null && $search != '') {
            $data['designations'] = Role::where('role_name', 'LIKE', '%' . $search . '%')->get();
        } else {
            $data['designations'] = Role::all();
        }


        if($id != null && $id != '') {
            $data['edit'] = Role::where('role_id', '=', $id)->first();
        } 

        return view('pages.human_resource.designation', $data);
    }


    public function designation_create(Request $request) {

        // check for role
        $data = $request->input('role_name');

        
        Role::create(['role_name' => $data]);

        return redirect()->route('designation')->with('status',['alert' => 'alert-success', 'msg' => 'Role created!'] );

    }

    public function designation_edit(Request $request) {

        // check for role
        $role_name  = $request->input('role_name');
        $id         = $request->input('id');

        $found      = Role::find($id);
        

        $found->role_name = $role_name;
        $found->save();

        return redirect()->route('designation')->with('status',['alert' => 'alert-info', 'msg' => 'Role edited'] );

    }


    public function designation_delete(Request $request) {

        $data = $request->input('id');

        Role::destroy($data);
        

        return redirect()->route('designation')->with('status',['alert' => 'alert-warning', 'msg' => 'Role deleted!'] );

    }

}
