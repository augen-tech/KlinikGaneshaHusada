<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DiagnosesTableSeeder extends Seeder
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
        $registrations = DB::table('registrations')->get();
        foreach(range(0,10) as $index){
            DB::table('diagnoses')->insert([                
                'registration_id' => $registrations[rand(0, count($registrations) - 1)]->id,
                'result' => $faker->text($maxNbChars = 190),                
            ]);
        }
    }
}
