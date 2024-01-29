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
        Schema::create('ourorders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('package');
            $table->string('company_id');
            $table->string('sale_id')->nullable();
            $table->string('start_date')->nullable();
            $table->string('payment_detail')->nullable();
            $table->string('price')->nullable();
            $table->string('referal_code')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ourorders');
    }
};
