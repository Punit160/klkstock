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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('company_id');
            $table->string('name');
            $table->string('product_code');
            $table->string('type')->nullable();
            $table->string('category')->nullable();
            $table->string('brand')->nullable();
            $table->string('product_unit')->nullable();
            $table->string('sale_unit')->nullable();
            $table->string('purchase_unit')->nullable();
            $table->string('cost')->nullable();
            $table->string('price')->nullable();
            $table->string('dso')->nullable();
            $table->string('alert_qty')->nullable();
            $table->string('product_tax')->nullable();
            $table->string('tax_method')->nullable();
            $table->string('detail',5000)->nullable();
            $table->string('image')->nullable();
            $table->string('initial_stock')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
        });

        Schema::create('option_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('option_id');
            $table->string('value');
            $table->string('company_id');
            $table->timestamps();
        });

        Schema::create('product_variation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('variation_id');
            $table->string('sku');
            $table->string('quantity');
            $table->string('warehouse');
            $table->string('variation_price');
            $table->string('company_id');
            $table->timestamps();
        });

        Schema::create('product_warehouse', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('warehouse_id');
            $table->string('quantity');
            $table->string('company_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_option');
        Schema::dropIfExists('product_variation');
        Schema::dropIfExists('product_warehouse');
    }
};
