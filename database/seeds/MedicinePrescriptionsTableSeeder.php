<?php

use Illuminate\Database\Seeder;

class MedicinePrescriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => 1,
            'medicine_id' => 1,
            'total' => rand(2,10), 
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => 1,
            'medicine_id' => 3,
            'total' => rand(2,10), 
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => 2,
            'medicine_id' => 4,
            'total' => rand(2,10), 
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => 3,
            'medicine_id' => 2,
            'total' => rand(2,10), 
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => 4,
            'medicine_id' => 1,
            'total' => rand(2,10), 
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => 4,
            'medicine_id' => 2,
            'total' => rand(2,10), 
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => 4,
            'medicine_id' => 4,
            'total' => rand(2,10), 
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => 5,
            'medicine_id' => 5,
            'total' => rand(2,10), 
        ]);
    }
}
