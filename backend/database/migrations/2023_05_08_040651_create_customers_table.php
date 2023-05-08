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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_email');
            $table->string('password');
            $table->string('customer_name');
            $table->string('avatar')->nullable();
            $table->integer('customer_gender')->nullable()->default(1);
            $table->date('customer_birthday')->nullable();
            $table->integer('customer_phone')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_address_company')->nullable();
            $table->string('order_detail')->nullable();
            $table->integer('state')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
