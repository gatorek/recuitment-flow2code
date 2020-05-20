<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
        });

        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('poster')->nullable();
            $table->longText('description');
            $table->string('country');
        });

        Schema::create('genre_movie', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('genre_id');
            $table->integer('movie_id');
            $table->foreign('genre_id')
                ->references('id')
                ->on('genres');
            $table->foreign('movie_id')
                ->references('id')
                ->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_movie');
        Schema::dropIfExists('movies');
        Schema::dropIfExists('genres');
    }
}
