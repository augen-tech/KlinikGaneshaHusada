<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RegistrationsTableSeeder extends Seeder
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

        foreach(range(0,10) as $index){
            DB::table('registrations')->insert([
                'patient_id' => rand(1,11),
                'complaint' => $faker->text($maxNbChars = 190), 
                'type' => rand(0,1), 
                'blood_pressure' => rand(50,100),               
            ]);
        }
    }
}
