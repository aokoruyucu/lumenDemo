<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramSpeakerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('program_speaker',function (Blueprint $table){

        $table->integer('program_id')->unsigned()->index();
        $table->foreign("program_id")->references("id")->on("programs");
        $table->integer('speaker_id')->unsigned()->index;
        $table->foreign("speaker_id")->references("id")->on("speakers");
        $table->integer('isActive');
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
        Schema::drop("program_speaker");

    }
}
