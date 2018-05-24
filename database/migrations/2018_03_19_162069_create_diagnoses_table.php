<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnoses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('registration_id')->unsigned();
            $table->string('evidence')->nullable();
            $table->string('subject')->nullable();
            $table->string('object')->nullable();
            $table->string('assesment')->nullable();
            $table->string('planning')->nullable();
            $table->string('price')->nullable();
            $table->string('result')->nullable();
            $table->integer('special_request');
            $table->timestamps();

            $table->foreign('registration_id')
                ->references('id')->on('registrations')
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
        Schema::dropIfExists('diagnoses');
    }
}
