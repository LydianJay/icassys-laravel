<?php

namespace Database\Seeders;

use App\Models\Designation;
use App\Models\Modules;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Staff;
use App\Models\SubModules;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $role = Role::create([
            'role_name' => 'Super Admin'
        ]);

        $user = User::create([
            
            'email'     => 'admin@example.com',
            'password'  => bcrypt('admin123'),
            'fname'     => 'Admin',
            'mname'     => 'Admin',
            'lname'     => 'Admin',
            'contactno' => '1234567890',
            'dob'       => Carbon::now()->format('Y-m-d'),
            ]
        );

        $staff = Staff::create([
            'user_id'   => $user->id,
            'join_date' => now()->toDateString()
        ]);

        Designation::create([
            'role_id'   => $role->role_id,
            'staff_id'  => $staff->staff_id,
        ]);
         

        $modules = config('menu');

        foreach($modules as $mod) {
            $m = Modules::create([
                'module_name'   => $mod['menu'],
                'icon'          => $mod['icon'],
            ]);

            foreach($mod['submenu'] as $mod_name => $content) {
                $submodule = SubModules::create([
                    'module_id' => $m['module_id'],
                    'subm_name' => $mod_name,
                    'route'     => $content['route'],
                ]);

                Permission::create([
                    'subm_id' => $submodule->subm_id,
                    'user_id' => $user->id,
                ]);
            }

            
        }
         
    } 

   
}
