<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColoumnToPatients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

       

        Schema::table('patients', function($table) {
            $table->string('parent_name')->before ('created_at');
            $table->string('religion')->before ('created_at');
            $table->string('parent_job')->before ('created_at');
            $table->integer('child_order')->before ('created_at');
            $table->double('birth_weight')->before ('created_at');
            $table->string('birth_attendant')->before ('created_at');
            $table->char('labor_method')->before ('created_at');
            $table->string('job')->before ('created_at');
            $table->string('allergy_history')->before ('created_at');
            $table->string('disease_history')->before ('created_at');
            $table->string('disease_history_family')->before ('created_at');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function($table) {
            $table->dropColumn('religion');
            $table->dropColumn('parent_name');
            $table->dropColumn('parent_job');
            $table->dropColumn('child_order');
            $table->dropColumn('birth_weight');
            $table->dropColumn('birth_attendant');
            $table->dropColumn('labor_method');
            $table->dropColumn('job');
            $table->dropColumn('allergy_history');
            $table->dropColumn('disease_history');
            $table->dropColumn('disease_history_family');
        });
    }
    
}
