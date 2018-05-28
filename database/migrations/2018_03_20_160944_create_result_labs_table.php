<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_labs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('diagnosis_id')->unsigned();
            $table->string('result');
            $table->timestamps();

            $table->foreign('diagnosis_id')
            ->references('id')->on('diagnoses')
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
        Schema::dropIfExists('result_labs');
    }
}
