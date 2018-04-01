<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_prescriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prescription_id')->unsigned();
            $table->integer('medicine_id')->unsigned();
            $table->integer('amount');
            $table->string('notation');
            $table->timestamps();

            $table->foreign('medicine_id')
                ->references('id')->on('medicines')
                ->onDelete('cascade');

            $table->foreign('prescription_id')
                ->references('id')->on('prescriptions')
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
        Schema::dropIfExists('medicine_prescriptions');
    }
}
