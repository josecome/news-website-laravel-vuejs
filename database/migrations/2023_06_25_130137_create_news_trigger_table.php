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
        Schema::create('news_trigger', function (Blueprint $table) {
            $table->id();
            $table->boolean('sent');
            $table->date('sent_date');
            $table->unsignedBigInteger('subscriber_id');
            $table->unsignedBigInteger('news_id');
            $table->unsignedBigInteger('edition_id');
            $table->unsignedBigInteger('user_id');
            /*$table->foreign('subscriber_id')->references('id')->on('subscriber')->onDelete('cascade');
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
            $table->foreign('edition_id')->references('id')->on('edition')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');*/
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_trigger');
    }
};
