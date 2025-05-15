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
        Schema::create('fee_type', function (Blueprint $table) { 
            $table->id('fee_type_id');
            $table->string('fee_type_name');
            $table->string('fees_code');
            $table->float('ammount');
        });


        Schema::create('fee_group', function (Blueprint $table) { 
            $table->id('fee_group_id');
            $table->foreignId('class_master_id')->constrained('class_master', 'class_master_id')->onDelete('cascade');
            $table->foreignId('fee_type_id')->constrained('fee_type', 'fee_type_id')->onDelete('cascade');
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
