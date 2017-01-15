<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs',function (Blueprint $table){
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('subtitle');
            $table->string('description');
            $table->string('start');
            $table->string('end');
            $table->string('url');
            $table->date('date');
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
        Schema::drop("programs");

    }
}
