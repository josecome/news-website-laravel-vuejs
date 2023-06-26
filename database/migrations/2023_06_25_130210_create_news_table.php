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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->date('news_date');
            $table->unsignedBigInteger('news_meta_id');
            $table->unsignedBigInteger('edition_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('edition_id')->references('id')->on('edition')->onDelete('cascade');
            $table->foreign('news_meta_id')->references('id')->on('news_meta')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
