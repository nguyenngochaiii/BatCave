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
        Schema::create('shopping_cart_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('shopping_cart_id');
            $table->integer('product_id');
            $table->float('unit_price')->nullable();
            $table->integer('quantity')->nullable();
            $table->float('promotion_price')->nullable();
            $table->integer('create_user')->nullable();
            $table->integer('modified_user')->nullable();
            $table->integer('state')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_cart_detail');
    }
};
