<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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
        $faker = Faker::create();

        foreach(range(0,10) as $index){
            DB::table('result_labs')->insert([                
                'diagnosis_id' => $index + 1,
                'result' => $faker->text($maxNbChars = 190),                                
            ]);
        }
    }
}
