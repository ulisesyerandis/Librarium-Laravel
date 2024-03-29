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
        // Schema::table('store_user', function (Blueprint $table) {
        //     $table->unsignedInteger('book_purchase_count')->default(0)->after('user_id');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('store_user', function (Blueprint $table) {
            $table->dropColumn('book_purchase_count');
        });
    }
};
