<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Modules;
use App\Models\SubModules;
use App\Models\DefPermission;

class Permission extends Controller
{
    public function index() {


        return view('pages.permission.permission');
    }

    public function role_permission() {



        $roles = Role::with([
                            'defaultPermissions.subModule.module'
                        ])->get();
        
        
        $roles = $roles->sortBy('role_name');

        // Optional: sort defaultPermissions inside each role
        $roles->each(function ($role) {
            $role->defaultPermissions = $role->defaultPermissions->sortBy(function ($perm) {
                return $perm->subModule->module->module_name . '-' . $perm->subModule->subm_name;
            });
        });

        $data['roles'] = $roles;
        // view - 1
        // create - 2
        // edit - 4
        // delete - 8

        $data['all'] = Modules::with('subModules')->get();
        // dd($data['roles']);
        $data['role_keys'] = [1 => 'view', 2 => 'create' , 4 => 'edit', 8 => 'delete'];
        return view('pages.permission.role_permission', $data);
    }

    public function role_permission_add(Request $request){
        $role_id    = $request->input('role_id');
        $sub_id     = $request->input('sub_id');
        $perm       = $request->input('perm');


        $exist = DefPermission::where('subm_id', '=', $sub_id)
                        ->where('role_id', '=', $role_id)
                        ->where('allowed', '=', $perm)->count();
        
        

        if($exist == 1) {
            return redirect()->back()->with( 'status',['alert' => 'alert-warning', 'msg' => "Permission already added" ]);
        }
                                                                            
        DefPermission::create([
            'subm_id' => $sub_id,
            'role_id' => $role_id,
            'allowed' => $perm,
        ]);


        return redirect()->back()->with( 'status',['alert' => 'alert-info', 'msg' => "Added a default permission" ]);


    }

    public function role_permission_remove(Request $request){
        $id    = $request->input('id');
        
        DefPermission::destroy($id);
       

        return redirect()->back()->with( 'status',['alert' => 'alert-danger', 'msg' => "Removed a default permission" ]);

    }
}
