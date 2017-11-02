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
            $table->string('ip_address', 45);
            $table->string('email')->unique();
            $table->integer('uploads_id')->unsigned();
            $table->integer('competition_id')->unsigned();
            $table->foreign("competition_id")->references("id")->on('competitions')->onDelete('cascade');
            $table->foreign("uploads_id")->references("id")->on('uploads')->onDelete('cascade');
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
