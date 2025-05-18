<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubModules;
use App\Models\Modules;
class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubModules::truncate();
        Modules::truncate();
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

                
            }

        }
    }
}
