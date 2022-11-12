<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainingid', function (Blueprint $table) {
            $table->increments('id');
            $table->string('google_id')->nullable();
            $table->foreign('google_id')->references('google_id')->on('users')->nullable();
            $table->string('skill')->nullable();
            $table->string('toeic')->nullable();
            $table->string('exp')->nullable();
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
        Schema::dropIfExists('trainingid');
    }
};
