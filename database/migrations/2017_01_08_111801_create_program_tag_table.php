<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_tag',function (Blueprint $table){

            $table->integer('program_id')->unsigned()->index();
            $table->foreign("program_id")->references("id")->on("programs");
            $table->integer('tag_id')->unsigned()->index;
            $table->foreign("tag_id")->references("id")->on("tags");
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
        Schema::drop("program_tag");

    }
}
