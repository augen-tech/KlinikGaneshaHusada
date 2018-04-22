<?php

use Illuminate\Database\Seeder;
use App\Prescription;
use App\Medicine;
use Faker\Factory as Faker;

class MedicinePrescriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prescriptions = Prescription::all();
        $medicines = Medicine::all();
        $faker = Faker::create();
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => $prescriptions[0]->id,
            'medicine_id' => $medicines[1]->id,
            'amount' => rand(2,10), 
            'notation' => $faker->text($maxNbChars = 190),
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => $prescriptions[0]->id,
            'medicine_id' => $medicines[3]->id,
            'amount' => rand(2,10), 
            'notation' => $faker->text($maxNbChars = 190), 
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => $prescriptions[1]->id,
            'medicine_id' => $medicines[4]->id,
            'amount' => rand(2,10), 
            'notation' => $faker->text($maxNbChars = 190),
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => $prescriptions[2]->id,
            'medicine_id' => $medicines[2]->id,
            'amount' => rand(2,10), 
            'notation' => $faker->text($maxNbChars = 190),
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => $prescriptions[3]->id,
            'medicine_id' => $medicines[0]->id,
            'amount' => rand(2,10), 
            'notation' => $faker->text($maxNbChars = 190), 
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => $prescriptions[4]->id,
            'medicine_id' => $medicines[1]->id,
            'amount' => rand(2,10), 
            'notation' => $faker->text($maxNbChars = 190), 
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => $prescriptions[4]->id,
            'medicine_id' => $medicines[3]->id,
            'amount' => rand(2,10), 
            'notation' => $faker->text($maxNbChars = 190),
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => $prescriptions[4]->id,
            'medicine_id' => $medicines[4]->id,
            'amount' => rand(2,10), 
            'notation' => $faker->text($maxNbChars = 190),
        ]);
    }
}
