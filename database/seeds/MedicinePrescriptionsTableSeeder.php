<?php

use Illuminate\Database\Seeder;
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
        //
        $faker = Faker::create();
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => 1,
            'medicine_id' => 1,
            'amount' => rand(2,10), 
            'notation' => $faker->text($maxNbChars = 190),
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => 1,
            'medicine_id' => 3,
            'amount' => rand(2,10), 
            'notation' => $faker->text($maxNbChars = 190),
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => 2,
            'medicine_id' => 4,
            'amount' => rand(2,10), 
            'notation' => $faker->text($maxNbChars = 190),
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => 3,
            'medicine_id' => 2,
            'amount' => rand(2,10), 
            'notation' => $faker->text($maxNbChars = 190),
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => 4,
            'medicine_id' => 1,
            'amount' => rand(2,10), 
            'notation' => $faker->text($maxNbChars = 190),
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => 4,
            'medicine_id' => 2,
            'amount' => rand(2,10),
            'notation' => $faker->text($maxNbChars = 190), 
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => 4,
            'medicine_id' => 4,
            'amount' => rand(2,10),
            'notation' => $faker->text($maxNbChars = 190), 
        ]);
        DB::table('medicine_prescriptions')->insert([
            'prescription_id' => 5,
            'medicine_id' => 5,
            'amount' => rand(2,10), 
            'notation' => $faker->text($maxNbChars = 190),
        ]);
    }
}
