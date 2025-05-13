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
        Schema::create('department', function (Blueprint $table) { 
            $table->id('dept_id');
            $table->string('dept_name');
        });

        Schema::create('staff', function (Blueprint $table) { 
            $table->id('staff_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('dept_id')->constrained('department', 'dept_id')->onDelete('cascade');
            $table->enum('marital', ['single', 'married', 'separated', 'widowed', 'not specified'])->default('not specified');
            $table->date('join_date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department');

        Schema::dropIfExists('staff');
    }
};
