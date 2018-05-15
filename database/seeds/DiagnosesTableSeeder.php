<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Registration;

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
        $registrations = Registration::all();
        $faker = Faker::create();
        foreach(range(0,10) as $index){
            DB::table('diagnoses')->insert([                
                'registration_id' => $registrations[rand(0, 10)]->id,
                'evidence' => $faker->text($maxNbChars = 190),   
                'subject' => $faker->text($maxNbChars = 190),   
                'object' => $faker->text($maxNbChars = 190),   
                'assesment' => $faker->text($maxNbChars = 190),   
                'planning' => $faker->text($maxNbChars = 190),    
                'price' => $faker->numberBetween($min = 1000, $max = 9000),
                'special_request' => rand(0,1),
                'created_at' => $faker->date($format = 'Y-m-d', $max = 'now')       
            ]);
        }
    }
}
