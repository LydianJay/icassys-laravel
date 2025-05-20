<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AcademicYear extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('academic_year')->insert([
            
            'period' => '2024-2025',
            'start_date' => '2024-01-01',
            'end_date' => '2025-12-31',
            'is_active' => 1,
        ]);
    }
}
