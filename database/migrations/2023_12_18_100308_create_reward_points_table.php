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
        Schema::create('reward_points', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->string('sold_amt_per_point')->nullable();
            $table->string('get_point_amt')->nullable();
            $table->string('expiry_point')->nullable();
            $table->string('duration_type')->nullable();
            $table->string('company_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reward_points');
    }
};
