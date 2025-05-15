<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\Role;
use App\Models\Staff;
use App\Models\User;
use App\Models\Designation;
use Illuminate\Support\Facades\DB;

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



    public function staff(Request $request) {

        
        $search = $request->input('search');
        $data = [];

        if($search != null && $search != ''){
            $data['users'] = User::join('staff', 'staff.user_id', '=', 'users.id')
            ->join('department', 'department.dept_id', '=', 'staff.dept_id')
            ->leftJoin('designation', 'designation.staff_id', '=', 'staff.staff_id')
            ->leftJoin('role', 'role.role_id', '=', 'designation.role_id')
            ->select('users.*', 'staff.*', 'department.*', 'designation.*', 'role.*')
            ->where('fname', 'LIKE', '%' . $search . '%')
            ->orWhere('lname', 'LIKE', '%' . $search . '%')
            ->limit(12)
            ->get();
        }
        else {
            $data['users'] = User::join('staff', 'staff.user_id', '=', 'users.id')
            ->join('department', 'department.dept_id', '=', 'staff.dept_id')
            ->leftJoin('designation', 'designation.staff_id', '=', 'staff.staff_id')
            ->leftJoin('role', 'role.role_id', '=', 'designation.role_id')
            ->select('users.*', 'staff.*', 'department.*', 'designation.*', 'role.*')
            ->get();
        }

        

        
        // dd($data['users']);
        return view('pages.human_resource.staff_directory', $data);
    }

    public function staff_edit_view(Request $request) {

        $data['dept'] = Department::all();
        $data['role'] = Role::all();
        $data['info'] = User::join('staff', 'staff.user_id','=','id')
        ->join('department', 'department.dept_id', '=', 'staff.dept_id')
        ->where('id', '=', $request->input('id'))
        ->first();

        // dd($data['info']);
        return view('pages.human_resource.staff_edit', $data);
    }

    public function staff_create_view() {

        $data['dept'] = Department::all();
        $data['role'] = Role::all();


       
        $data['staff_id'] = DB::table('staff')->max('staff_id') + 1;


        return view('pages.human_resource.staff_create', $data);
    }


    public function staff_create(Request $request) {

        $validated = $request->validate([
            'staff_id'      => 'required|integer|unique:staff,staff_id',
            'username'      => 'required|max:64',
            'role'          => 'required|exists:role,role_id',
            'dept'          => 'required|exists:department,dept_id',
            'join_date'     => 'required|date',
            'fname'         => 'required|string|max:255',
            'mname'         => 'nullable|string|max:255',
            'lname'         => 'required|string|max:255',
            'dob'           => 'required|date|before:today',
            'address'       => 'required|string|max:500',
            'gender'        => 'required|in:male,female,other',
            'marital'       => 'required',
            'e_contact'     => 'required|string|max:255',
            'e_contact_no'  => 'required|string|max:15',
            'file'          => 'nullable|file|mimes:jpg,jpeg,png|max:8192',
        ]);

        // dd($validated);
        $filename = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $ext    = $file->getClientOriginalExtension();
            $filename = md5($validated['staff_id']) . '.' . $ext;
            $file->storeAs('uploads/staff', $filename, 'public');

        }


        $user = User::create([
            'fname'         => $validated['fname'],
            'lname'         => $validated['lname'],
            'mname'         => $validated['mname'],
            'dob'           => $validated['dob'],
            'email'         => $validated['username'],
            'password'      => bcrypt($validated['fname'] . $validated['lname']),
            'join_date'     => $validated['join_date'],
            'address'       => $validated['address'],
            'gender'        => $validated['gender'],
            'e_contact'     => $validated['e_contact'],
            'e_contact_no'  => $validated['e_contact_no'],
            'photo'         => $filename,
        ]);
        
        $staff = Staff::create([
            'staff_id'  => $validated['staff_id'],
            'user_id'   => $user->id,
            'dept_id'   => $validated['dept'],
            'marital'   => $validated['marital'],
            'join_date' => $validated['join_date'], 
        ]);

        Designation::create([
            'role_id'   => $validated['role'],
            'staff_id'  => $staff->staff_id,
        ]);

        return redirect()->route('staff_create_view')->with('status',['alert' => 'alert-info', 'msg' => 'User Created!'] );
    }

}
