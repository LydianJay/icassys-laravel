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
        Schema::create('modules', function (Blueprint $table) { 
            $table->id('module_id');
            $table->string('module_name');
            $table->string('icon');
        });

        Schema::create('sub_modules', function (Blueprint $table) { 
            $table->id('subm_id');
            $table->foreignId('module_id')->constrained('modules', 'module_id')->onDelete('cascade');
            $table->string('subm_name');
            $table->string('route');
        });


        Schema::create('permission', function (Blueprint $table) { 
            $table->id('perm_id');
            $table->foreignId('subm_id')->constrained('sub_modules', 'subm_id')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->integer('allowed')->default(15); // bitmask 
            // view - 1
            // create - 2
            // edit - 4
            // delete - 8
            // all - 15
        });

        Schema::create('def_permission', function (Blueprint $table) { 
            $table->id('def_perm_id');
            $table->foreignId('subm_id')->constrained('sub_modules', 'subm_id')->onDelete('cascade');
            $table->foreignId('role_id')->constrained('role', 'role_id')->onDelete('cascade');
            $table->integer('allowed')->default(15); // bitmask 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
        Schema::dropIfExists('sub_modules');
        Schema::dropIfExists('permission');
        Schema::dropIfExists('def_permission');
    }
};
