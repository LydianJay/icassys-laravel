<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       
        // Schema::create('modules', function (Blueprint $table) { 
        //     $table->id('mod_id');
        //     $table->string('mod_name');
        // });

        // Schema::create('sub_modules', function (Blueprint $table) { 
        //     $table->id('subm_id');
        //     $table->foreignId('mod_id')->constrained('modules', 'mod_id')->onDelete('cascade');
        //     $table->string('subm_name');
        // });

        // Schema::create('permission', function (Blueprint $table) { 
        //     $table->id('perm_id');
        //     $table->foreignId('subm_id')->constrained('sub_modules', 'subm_id')->onDelete('cascade');
        //     $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        //     $table->enum('allowed', ['view', 'create', 'delete'])->default('view');
        // });

        // Schema::create('def_permission', function (Blueprint $table) { 
        //     $table->id('perm_id');
        //     $table->foreignId('subm_id')->constrained('sub_modules', 'subm_id')->onDelete('cascade');
        //     $table->enum('allowed', ['view', 'create', 'delete'])->default('view');
        // });


       

        Schema::create('role', function (Blueprint $table) { 
            $table->id('role_id');
            $table->string('role_name');
        });

        Schema::create('designation', function (Blueprint $table) { 
            $table->id('d_id');
            $table->foreignId('role_id')->constrained('role', 'role_id')->onDelete('cascade');
            $table->foreignID('staff_id')->constrained('staff', 'staff_id')->onDelete('cascade');
        }); 


        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
