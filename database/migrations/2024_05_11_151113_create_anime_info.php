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
        // Create the 'anime_info' table first
        Schema::create('anime_info', function (Blueprint $table) {
            $table->increments('anime_id');
            $table->string('title')->unique();
            $table->string('airing_season');
            $table->integer('airing_year');
            $table->integer('episodes');
            $table->date('airing_date');
            $table->string('synopsis');
            $table->string('studio');
            $table->string('status');
            $table->timestamps();
        });

        // Create the 'genre' table next
        Schema::create('genre', function (Blueprint $table) {
            $table->increments('genre_id');
            $table->string('genre_name');
        });

        // Create the 'anime_genre' table last
        Schema::create('anime_genre', function (Blueprint $table) {
            $table->unsignedInteger('anime_id');
            $table->unsignedInteger('genre_id');
            $table->primary(['anime_id', 'genre_id']);

            $table->foreign('anime_id')
                ->references('anime_id')
                ->on('anime_info')
                ->onDelete('cascade');

            $table->foreign('genre_id')
                ->references('genre_id')
                ->on('genre')
                ->onDelete('cascade');
        });

        Schema::create('watchlist', function(Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('anime_id');
            $table->integer('episodes_watched');
            $table->primary(['user_id', 'anime_id']);

            $table->foreign('anime_id')
                ->references('anime_id')
                ->on('anime_info')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anime_genre');
        Schema::dropIfExists('genre');
        Schema::dropIfExists('anime_info');
    }
};