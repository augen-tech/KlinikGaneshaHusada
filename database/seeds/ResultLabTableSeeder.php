<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Diagnosis;

class ResultLabTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $diagnoses = Diagnosis::all();
        $faker = Faker::create();
        foreach(range(0,10) as $index){
            DB::table('result_labs')->insert([                
                'diagnosis_id' => $diagnoses[rand(0, 10)]->id,
                'result' => $faker->text($maxNbChars = 190),                                
            ]);
        }
    }
}
