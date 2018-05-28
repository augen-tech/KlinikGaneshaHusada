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
        $religions = array ("Islam","Katolik","Hindu");
        $jobs = array ("Driver", "Doctor", "Programmer");
        $labor_methods = array ("Normal", "Cesarean");
        $allergys = array ("Latex", "Asthma", "Food");
        $diseases = array ("Flu", "Cancer", "Cough");
        foreach(range(0,10) as $index){
            $patients_type = rand(0,1);

            if($patients_type == 0){
                //anak
                DB::table('patients')->insert([
                    'name' => $faker->name,
                    'dob' => $faker->date($format = 'Y-m-d', $max = '2000-01-01'),
                    'address' => $faker->address,
                    'blood_type' => $blood_type[array_rand($blood_type)],
                    'gender' => $gender[array_rand($gender)],
                    'phone' => $faker->phoneNumber,
                
                
                    //anak
                    'parent_name' => $faker->name,
                    'parent_job' => $jobs [array_rand($jobs)],
                    'child_order' => rand (1,5),
                    'birth_weight' => rand (2,5),
                    'birth_attendant' =>$faker->name,
                    'labor_method' => $labor_methods [array_rand($labor_methods)],
                
                    //dewasa
                    'religion' =>'',
                    'job' =>'',
                    'allergy_history' =>'',
                    'disease_history' =>'',
                    'disease_history_family' =>'',
                    
                    
                ]);

            } else{
                //dewasa
                DB::table('patients')->insert([
                    'name' => $faker->name,
                    'dob' => $faker->date($format = 'Y-m-d', $max = '2000-01-01'),
                    'address' => $faker->address,
                    'blood_type' => $blood_type[array_rand($blood_type)],
                    'gender' => $gender[array_rand($gender)],
                    'phone' => $faker->phoneNumber,
                    
                    //anak
                    'parent_name' =>'',
                    'parent_job' =>'',
                    'child_order' =>0,
                    'birth_weight' =>0,
                    'birth_attendant' =>'',
                    'labor_method' =>'',

                    //dewasa
                    'religion' =>$religions [array_rand($religions)],
                    'job' => $jobs [array_rand($jobs)],
                    'allergy_history' => $allergys [array_rand($allergys)],
                    'disease_history' => $diseases [array_rand($diseases)],
                    'disease_history_family' => $diseases [array_rand($diseases)],
                
    
                ]);
            }

        }
    }
}
