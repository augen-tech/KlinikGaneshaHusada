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
        foreach(range(0,4) as $index){
            DB::table('prescriptions')->insert([
                'name' => $medicine[$index],
                'stock' => rand(10,50),
                'price' => rand(5000,10000),
                
            ]);
        }
    }
}
