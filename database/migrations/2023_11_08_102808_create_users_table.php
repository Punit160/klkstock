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
            $table->string('name');
            $table->string('company_prefix')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('company_id')->nullable();
            $table->string('role')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('gender')->nullable();
            $table->string('doj')->nullable();
            $table->string('phone')->nullable();
            $table->string('status')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
