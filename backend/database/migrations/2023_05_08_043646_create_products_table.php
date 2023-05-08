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
            $table->string('product_name');
            $table->string('product_code');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->float('price')->nullable();
            $table->float('promotion_price')->nullable();
            $table->integer('include_vat')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('material')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('supplier_id');
            $table->integer('categoty_id');
            $table->integer('warranty')->nullable();
            $table->string('metal_keyword')->nullable();
            $table->string('metal_description')->nullable();
            $table->integer('create_user')->nullable();
            $table->integer('modified_user')->nullable();
            $table->integer('state')->default(1);
            $table->integer('view_count')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
