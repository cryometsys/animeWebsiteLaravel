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
        Schema::create('animes', function (Blueprint $table) {
            $table->increments('anime_id');
            $table->string('title')->unique();
            $table->string('airing_season');
            $table->integer('airing_year');
            $table->integer('episodes');
            $table->string('animeDuration');
            $table->date('airing_date');
            $table->date('ending_date');
            $table->string('synopsis');
            $table->string('studio');
            $table->string('status');
            $table->string('format');
            $table->string('animeCover')->nullable(false);
            $table->timestamps();
        });

        // Create the 'genre' table next
        Schema::create('genres', function (Blueprint $table) {
            $table->increments('genre_id');
            $table->string('genre_name');
            $table->timestamps();
        });

        // Create the 'anime_genre' table last
        Schema::create('anime_genres', function (Blueprint $table) {
            $table->unsignedInteger('anime_id');
            $table->unsignedInteger('genre_id');
            $table->timestamps();
            $table->primary(['anime_id', 'genre_id']);

            $table->foreign('anime_id')
                ->references('anime_id')
                ->on('animes')
                ->onDelete('cascade');

            $table->foreign('genre_id')
                ->references('genre_id')
                ->on('genres')
                ->onDelete('cascade');
        });

        Schema::create('watchlists', function(Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('anime_id');
            $table->integer('episodes_watched');
            $table->decimal('user_rating', 2, 1);
            $table->string('watch_status');
            $table->primary(['user_id', 'anime_id']);
            $table->timestamps();

            $table->foreign('anime_id')
                ->references('anime_id')
                ->on('animes')
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
        Schema::dropIfExists('animes');
    }
};