<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Winnaar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('winnaars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('registration_id')->unsigned();
            $table->integer('competition_id')->unsigned();
            $table->foreign("registration_id")->references("id")->on('registrations')->onDelete('cascade');
            $table->foreign("competition_id")->references("id")->on('competitions')->onDelete('cascade');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('winnaar');
        //
    }
}
