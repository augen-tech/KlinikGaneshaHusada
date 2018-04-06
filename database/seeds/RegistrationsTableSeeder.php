<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Patient;


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
        
        $faker = Faker::create();
        foreach(range(0,10) as $index){
            DB::table('registrations')->insert([
                'patient_id' => $patients[rand(0, 10)]->id,
                'doctor_id' => 3,
                'complaint' => $faker->text($maxNbChars = 190), 
                'type' => rand(0,1), 
                'blood_pressure' => rand(50,100) . "/" . rand(50,100) ,               
            ]);
        }
    }
}
