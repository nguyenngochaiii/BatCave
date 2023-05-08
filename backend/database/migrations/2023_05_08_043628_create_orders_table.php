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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('shipper_id');
            $table->integer('shipping_method_id');
            $table->integer('order_status_id');
            $table->float('shipping_cost');
            $table->string('note')->nullable();
            $table->date('order_date')->nullable();
            $table->date('shipped_date')->nullable();
            $table->date('shipping_required_date')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
