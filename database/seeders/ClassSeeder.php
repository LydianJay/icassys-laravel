<?php

namespace Database\Seeders;

use App\Models\ClassMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(config('classes') as $cls) {
            ClassMaster::create([
                'class_name'    => $cls['class_name'],
                'class_code'    => $cls['class_code'],
                'category'      => $cls['category'],
            ]);
            
        }
    }
}
