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

        Schema::create('class_master', function (Blueprint $table) { 
            $table->id('class_master_id');
            $table->string('class_name');
            $table->string('class_code');
            $table->enum('category', ['pre-school', 'elementary', 'junior-high', 'senior-high', 'college']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_master');
    }
};
