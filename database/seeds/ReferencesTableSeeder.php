<?php

use Illuminate\Database\Seeder;
use App\Diagnosis;
use Faker\Factory as Faker;

class ReferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Diagnoses = Diagnosis::all();
        $faker = Faker::create();
        foreach(range(0,10) as $index){
            DB::table('references')->insert([                
                'diagnosis_id' => $index+1,
                'hospital' => $faker->text($maxNbChars = 190),   
                'address' => $faker->text($maxNbChars = 190),   
                'message' => $faker->text($maxNbChars = 190)       
            ]);
        }
    }
}
