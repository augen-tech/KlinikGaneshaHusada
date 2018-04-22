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
                'result' => $faker->text($maxNbChars = 190),     
                'special_request' => $faker->text($maxNbChars = 190),
                'created_at' => $faker->date($format = 'Y-m-d', $max = 'now')       
            ]);
        }
    }
}
