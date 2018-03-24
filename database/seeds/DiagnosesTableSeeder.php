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


        foreach(range(0,10) as $index){
            DB::table('diagnoses')->insert([                
                'registration_id' => $index + 1,
                'result' => $faker->text($maxNbChars = 190),                
                'special_request' => $faker->text($maxNbChars = 190),                
            ]);
        }
    }
}
