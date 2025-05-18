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
        Schema::create('student_fees', function (Blueprint $table) { 
            $table->id('student_fee_id');
            $table->foreignId('student_id')->constrained('student', 'student_id')->onDelete('cascade');
            $table->foreignId('fee_type_id')->constrained('fee_type', 'fee_type_id')->onDelete('cascade');
            $table->foreignId('academic_year_id')->constrained('academic_year', 'academic_year_id')->onDelete('cascade');
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
