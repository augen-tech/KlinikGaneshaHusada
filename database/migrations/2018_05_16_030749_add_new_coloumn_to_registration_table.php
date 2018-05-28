<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColoumnToRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('registrations', function( $table) {
            $table->integer('weight')->before ('blood_pressure');
            $table->integer('high')->before ('blood_pressure');
                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('registrations', function($table) {
            $table->dropColumn('weight');
            $table->dropColumn('high');
            
        });
    }
}
