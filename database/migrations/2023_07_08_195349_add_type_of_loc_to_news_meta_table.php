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
        Schema::table('news_meta', function (Blueprint $table) {
            $table->string('type_of_loc', 40)->default('no type loc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news_meta', function (Blueprint $table) {
            $table->dropColumn('type_of_loc');
        });
    }
};
