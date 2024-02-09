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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('company_id');
            $table->string('date');
            $table->string('purch_code');
            $table->string('document');
            $table->string('warehouse');
            $table->string('supplier');
            $table->string('purch_status');
            $table->string('ord_tax');
            $table->string('tc', 3000);
            $table->string('disct');
            $table->string('ship_cst');
            $table->string('created_by');
            $table->timestamps();
        });

        Schema::create('product_purchase', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_id');
            $table->foreign('purchase_id')->references('id')->on('purchases');
            $table->string('product_type');
            $table->string('product_code');
            $table->string('price');
            $table->string('tax');
            $table->string('subtotal');
            $table->string('total');
            $table->string('discount');
            $table->string('shiping_cost');
            $table->string('company_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_purchase');
        Schema::dropIfExists('purchases');
    }
};
