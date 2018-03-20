<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('diagnosis_id')->unsigned();
            $table->integer('medicine_id')->unsigned();
            $table->timestamps();

            $table->foreign('diagnosis_id')
            ->references('id')->on('diagnoses')
            ->onDelete('cascade');

            $table->foreign('medicine_id')
            ->references('id')->on('medicines')
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
        Schema::dropIfExists('prescriptions');
    }
}
