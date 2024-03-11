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
        Schema::create('store_user', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('user_id');

            // $table->string('role');

            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDeletet('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_user');
    }
};
