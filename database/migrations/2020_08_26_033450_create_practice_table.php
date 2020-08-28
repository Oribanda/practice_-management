<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice', function (Blueprint $table) {
            $table->id();
            $table->integer('practice_time');
            $table->string('bass_key');
            $table->integer('bass_times');
            $table->string('stretch_key');
            $table->integer('stretch_times');
            $table->integer('falsetto_times');
            $table->string('practice_song');
            $table->text('other');
            $table->integer('users_id')->unsigned();
            $table->integer('songs_id')->unsigned();
            $table->timestamps();

            $table->foreign('users_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('songs_id')
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
        Schema::dropIfExists('practice');
    }
}
