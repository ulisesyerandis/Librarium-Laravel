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
        // Schema::table('book_store', function (Blueprint $table) {
        //     $table->integer('copies_sold_count')->default(0)->after('number of book');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('book_store', function (Blueprint $table) {
            $table->dropColumn('copies_sold_count');
        });
    }
};
