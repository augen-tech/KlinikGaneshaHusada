<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $blood_type = array("A", "B", "AB", "O");
        $gender = array("M", "F");
        foreach(range(0,10) as $index)
        DB::table('patients')->insert([
            'name' => $faker->name,
            'dob' => $faker->date($format = 'Y-m-d', $max = '2000-01-01'),
            'address' => $faker->address,
            'blood_type' => $blood_type[array_rand($blood_type)],
            'gender' => $gender[array_rand($gender)],
            'phone' => $faker->phoneNumber,
        ]);
    }
}
