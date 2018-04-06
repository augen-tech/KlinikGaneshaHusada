<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Patient;
use App\User;

class RegistrationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $patients = Patient::all();
        $role = Sentinel::findRoleById(3);
        $doctors = $role->users()->with('roles')->get();
        $faker = Faker::create();
        foreach(range(0,10) as $index){
            DB::table('registrations')->insert([
                'patient_id' => $patients[rand(0, 10)]->id,
                'doctor_id' => $doctors[rand(0, 1)]->id,
                'complaint' => $faker->text($maxNbChars = 190), 
                'type' => rand(0,1), 
                'blood_pressure' => rand(50,250) . "/" . rand(50,250) ,               
            ]);
        }
    }
}
