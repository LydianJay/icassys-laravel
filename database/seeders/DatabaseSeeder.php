<?php

namespace Database\Seeders;

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

        User::create([
            
            'email' => 'test@example.com',
            'password' => bcrypt('admin123'),
            'fname' => 'Admin',
            'mname' => 'Admin',
            'lname' => 'Admin',
            'contactno' => '1234567890',
            'dob' => Carbon::now()->format('Y-m-d'),
            ]
        );
    }

   
}
