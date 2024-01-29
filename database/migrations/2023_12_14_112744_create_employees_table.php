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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('dept')->nullable();
            $table->string('contact')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('role')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('staff_id')->nullable();
            $table->string('as_user')->nullable();
            $table->string('company_id')->nullable();
            $table->string('emp_id')->nullable();
            $table->string('doj')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
