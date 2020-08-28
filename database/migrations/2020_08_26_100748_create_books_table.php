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
            $table->integer('key_id')->unsigned();
            $table->integer('genre_id')->unsigned();
            $table->integer('tempo_id')->unsigned();
            $table->integer('gender_id')->unsigned();
            $table->timestamps();

            $table->foreign('key_id')
                ->references('id')
                ->on('key')
                ->onDelete('cascade');

            $table->foreign('genre_id')
                ->references('id')
                ->on('genre')
                ->onDelete('cascade');

            $table->foreign('tempo_id')
                ->references('id')
                ->on('tempo')
                ->onDelete('cascade');

            $table->foreign('gender_id')
                ->references('id')
                ->on('gender')
                ->onDelete('cascade');
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
