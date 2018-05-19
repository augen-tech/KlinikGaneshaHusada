<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $medicine = array("simprofen","penicilin","amoxcilin","obh","diapet");
        $type = array("racik","pil");
        foreach(range(0,4) as $index){
            DB::table('medicines')->insert([
                'name' => $medicine[$index],
                'type' => $type[array_rand($type)],
                'stock' => rand(10,50),
                'price' => rand(5000,10000),
                
            ]);
        }
    }
}
