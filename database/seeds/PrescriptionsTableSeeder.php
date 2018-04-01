<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class PrescriptionsTableSeeder extends Seeder
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
        foreach(range(0,9) as $index){
            DB::table('prescriptions')->insert([
                'diagnosis_id' => $index+1, 
                
            ]);
        }
        

    }
}
