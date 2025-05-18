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

        Schema::create('academic_year', function (Blueprint $table) { 
            $table->id('academic_year_id');
            $table->string('period');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_active')->default(false);
        }); 


        Schema::create('enrollment', function (Blueprint $table) { 
            $table->id('enrollment_id');
            $table->foreignId('student_id')->constrained('student', 'student_id')->onDelete('cascade');
            $table->foreignId('class_master_id')->constrained('class_master', 'class_master_id')->onDelete('cascade');
            $table->foreignId('academic_year_id')->constrained('academic_year', 'academic_year_id')->onDelete('cascade');
            $table->boolean('is_active')->default(false);
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
