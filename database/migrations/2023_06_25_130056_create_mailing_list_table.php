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
        Schema::create('mailing_list', function (Blueprint $table) {
            $table->id();
            $table->string('mail', 64);
            $table->boolean('status');
            $table->unsignedBigInteger('subscriber_id');
            $table->unsignedBigInteger('user_id');
            /*$table->foreign('subscriber_id')->references('id')->on('subscriber')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');*/
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mailing_list');
    }
};
