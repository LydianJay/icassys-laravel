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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->enum('gender', ['male', 'female', 'other'])->default('other');
            $table->date('dob');
            $table->enum('designation', ['admin', 'staff', 'student', 'parent'])->default('student');
            $table->string('contactno')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->boolean('is_active')->default(true);
            $table->string('e_contact')->nullable()->default(null);
            $table->string('e_contact_no')->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->string('photo')->nullable()->default(null);
            $table->string('password');
            $table->rememberToken()->nullable()->default(null);
            $table->timestamps();
        });

        

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
