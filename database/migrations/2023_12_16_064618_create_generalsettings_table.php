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
        Schema::create('generalsettings', function (Blueprint $table) {
            $table->id();
            $table->string('sys_title')->nullable();
            $table->string('sys_logo')->nullable();
            $table->string('rtl')->nullable();
            $table->string('company_name')->nullable();
            $table->string('vat_no')->nullable();
            $table->string('time_zone')->nullable();
            $table->string('currency')->nullable();
            $table->string('currency_pstn')->nullable();
            $table->string('after_decimal')->nullable();
            $table->string('without_stock')->nullable();
            $table->string('staff_access')->nullable();
            $table->string('invoice_formet')->nullable();
            $table->string('date_formet')->nullable();
            $table->string('developed_by')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generalsettings');
    }
};
