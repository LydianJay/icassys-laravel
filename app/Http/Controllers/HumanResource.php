<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\Role;
class HumanResource extends Controller
{


    public function index() {
        


        

    }


    public function department(Request $request) {

        $search = $request->input('search');
        $id     = $request->input('id');

        if($search != null && $search != '') {
            $data['departments'] = Department::where('dept_name', 'LIKE', '%' . $search . '%')->get();
        } else {
            $data['departments'] = Department::all();
        }


        if($id != null && $id != '') {
            $data['edit'] = Department::where('dept_id', '=', $id)->first();
        } 

        return view('pages.human_resource.department', $data);
    }

    public function department_create(Request $request) {

        // check for role
        $data = $request->input('dept_name');

        
        Department::create(['dept_name' => $data]);

        return redirect()->route('department')->with('status',['alert' => 'alert-success', 'msg' => 'Department created!'] );

    }


    public function department_edit(Request $request) {

        // check for role
        $dept_name  = $request->input('dept_name');
        $id         = $request->input('id');

        $found      = Department::find($id);
        

        $found->dept_name = $dept_name;
        $found->save();

        return redirect()->route('department')->with('status',['alert' => 'alert-info', 'msg' => 'Department edited'] );

    }


    public function department_delete(Request $request) {

        $data = $request->input('id');

        Department::destroy($data);
        

        return redirect()->route('department')->with('status',['alert' => 'alert-warning', 'msg' => 'Department deleted!'] );

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



    public function staff() {


        return view('pages.human_resource.staff_directory');
    }


    public function staff_create_view() {




        return view('pages.human_resource.staff_create');

    }

}
