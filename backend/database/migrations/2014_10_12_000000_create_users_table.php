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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('account_id')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('email');
            $table->integer('role_id');
            $table->string('avatar')->nullable();
            $table->integer('gender')->nullable()->default(1); //1: man, 2:women
            $table->date('birthday')->nullable();
            $table->string('address')->nullable();
            $table->integer('phone')->nullable();
            $table->integer('state')->default(1); //1:live 9:kill
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
