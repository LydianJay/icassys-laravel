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
        Schema::create('guardian', function (Blueprint $table) { 
            $table->id('guardian_id');
            $table->enum('relation', ['parent', 'relative', 'guardian']);
            $table->string('name');
            $table->string('g_contactno');
            $table->string('address');
            $table->string('occupation')->nullable()->default(null);
        });
        
        Schema::create('student', function (Blueprint $table) { 
            $table->id('student_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('admission_no');
            $table->foreignId('guardian_id')->constrained('guardian', 'guardian_id')->onDelete('cascade');
            $table->enum('category', ['pre-school', 'elementary', 'junior-high', 'senior-high', 'college']);
            $table->integer('lvl')->default('1');
            $table->enum('sem', ['none', '1st', '2nd', 'summer'])->default('none');
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardian');
        Schema::dropIfExists('student');
    }
};
