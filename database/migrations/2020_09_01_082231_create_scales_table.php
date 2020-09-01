<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('E_under');
            $table->string('F');
            $table->string('F#');
            $table->string('G');
            $table->string('G#');
            $table->string('A');
            $table->string('A#');
            $table->string('B');
            $table->string('hi_C');
            $table->string('hi_C#');
            $table->string('hi_D');
            $table->string('hi_D#');
            $table->string('hi_E');
            $table->string('hi_F_over');
            $table->integer('song_id')->unsigned();
            $table->timestamps();

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
        Schema::dropIfExists('scales');
    }
}
