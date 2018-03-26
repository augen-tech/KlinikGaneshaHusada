<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $role = array("Admin", "Receptionist", "Doctor", "Midwife", "HealthAnalyst", "Pharmacist");
        foreach(range(0,20) as $index){
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => 'test123',
                'role' => $role[array_rand($role)],
            ]);
        }
    }
}
