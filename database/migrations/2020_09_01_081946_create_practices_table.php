<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('practice_time');
            $table->string('bass_key');
            $table->integer('bass_times');
            $table->string('stretch_key');
            $table->integer('stretch_times');
            $table->integer('falsetto_times');
            $table->text('other');
            $table->string('practice_song');
            $table->string('practice_artist');
            $table->integer('user_id')->unsigned();
            $table->integer('song_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('song_id')
                ->references('id')
                ->on('songs')
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
        Schema::dropIfExists('practices');
    }
}
