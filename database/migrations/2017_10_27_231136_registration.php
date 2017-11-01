<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Registration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('straat');
            $table->string('nummer');
            $table->string('stad');
            $table->string('postcode');
            $table->softDeletes();
            $table->string('email')->unique();
            $table->integer('upload_id')->unsigned();
//            $table->integer('competition_id')->unsigned();
//            $table->foreign("competition_id")->references("id")->on('competition')->onDelete('cascade');
            $table->foreign("upload_id")->references("id")->on('uploads')->onDelete('cascade');
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
        Schema::dropIfExists('registration');
        //
    }
}
