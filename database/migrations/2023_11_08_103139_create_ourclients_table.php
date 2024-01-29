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
        Schema::create('ourclients', function (Blueprint $table) {
            $table->id();
            $table->string('package')->nullable();
            $table->string('company_name', 500)->nullable();
            $table->string('company_prefix')->nullable();
            $table->string('company_id');
            $table->string('order_id');
            $table->string('password');
            $table->string('sale_id')->nullable();
            $table->string('gst_number')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('alternate_phone')->nullable();
            $table->string('address', 2000)->nullable();
            $table->string('doj')->nullable();
            $table->string('status')->nullable();
            $table->string('payment_detail')->nullable();
            $table->string('price')->nullable();
            $table->string('referal_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ourclients');
    }
};
