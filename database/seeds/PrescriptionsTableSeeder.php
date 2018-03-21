<?php

use Illuminate\Database\Seeder;


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
        foreach(range(0,9) as $index){
            DB::table('prescriptions')->insert([
                'diagnosis_id' => $index+1,
                'total_price' => rand(75000,250000), 
            ]);
        }
        

    }
}
