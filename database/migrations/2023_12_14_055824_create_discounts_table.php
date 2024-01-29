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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('plan')->nullable();
            $table->string('applicable')->nullable();
            $table->string('status')->nullable();
            $table->string('valid_from')->nullable();
            $table->string('valid_till')->nullable();
            $table->string('type')->nullable();
            $table->string('value')->nullable();
            $table->string('min_qty')->nullable();
            $table->string('max_qty')->nullable();
            $table->string('company_id')->nullable();
            $table->string('date')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
