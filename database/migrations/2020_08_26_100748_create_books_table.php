<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('song_name');
            $table->string('artist_name');
            $table->unsignedBigInteger('key_id');
            $table->foreign('key_id')->references('id')->on('key');
            $table->unsignedBigInteger('genre_id');
            $table->foreign('genre_id')->references('id')->on('genre');
            $table->unsignedBigInteger('tempo_id');
            $table->foreign('tempo_id')->references('id')->on('tempo');
            $table->unsignedBigInteger('gender_id');
            $table->foreign('gender_id')->references('id')->on('gender');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
