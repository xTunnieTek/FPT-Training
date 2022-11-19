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
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('courseid');
            $table->string('categoryid')->references('categoryid')->on('category')->nullable();
            $table->string('coursename')->nullable();
            $table->text('description')->nullable();
            $table->string('trainer')->references('id')->on('users')->nullable();
            $table->string('images')->nullable();
            $table->date('startdate')->nullable();
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
        Schema::dropIfExists('courses');
    }
};