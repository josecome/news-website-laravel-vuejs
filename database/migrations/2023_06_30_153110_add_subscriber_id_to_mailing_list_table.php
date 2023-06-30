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
        Schema::table('mailing_list', function (Blueprint $table) {
            $table->foreign('subscriber_id')->references('id')->on('subscriber')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mailing_list', function (Blueprint $table) {
            $table->dropColumn('subscriber_id');
        });
    }
};
