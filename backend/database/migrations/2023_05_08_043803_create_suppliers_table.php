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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name');
            $table->string('brand_name')->nullable();
            $table->string('avatar');
            $table->string('supplier_email')->nullable();
            $table->integer('create_user')->nullable();
            $table->integer('modified_user')->nullable();
            $table->integer('supplier_phone')->nullable();
            $table->string('supplier_address')->nullable();
            $table->integer('state')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
