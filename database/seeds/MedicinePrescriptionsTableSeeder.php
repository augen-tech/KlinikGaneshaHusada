<?php

use Illuminate\Database\Seeder;
use App\Prescription;
use App\Medicine;

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
        $prescriptions = Prescription::all();
        $medicines = Medicine::all();
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => $prescriptions[0]->id,
            'medicine_id' => $medicines[1]->id,
            'total' => rand(2,10), 
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => $prescriptions[0]->id,
            'medicine_id' => $medicines[3]->id,
            'total' => rand(2,10), 
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => $prescriptions[1]->id,
            'medicine_id' => $medicines[4]->id,
            'total' => rand(2,10), 
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => $prescriptions[2]->id,
            'medicine_id' => $medicines[2]->id,
            'total' => rand(2,10), 
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => $prescriptions[3]->id,
            'medicine_id' => $medicines[0]->id,
            'total' => rand(2,10), 
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => $prescriptions[4]->id,
            'medicine_id' => $medicines[1]->id,
            'total' => rand(2,10), 
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => $prescriptions[4]->id,
            'medicine_id' => $medicines[3]->id,
            'total' => rand(2,10), 
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => $prescriptions[4]->id,
            'medicine_id' => $medicines[4]->id,
            'total' => rand(2,10), 
        ]);
    }
}
