<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PatientsTableSeeder::class);
        $this->call(RegistrationsTableSeeder::class);
        $this->call(DiagnosesTableSeeder::class);
        $this->call(PrescriptionsTableSeeder::class);
        $this->call(MedicinesTableSeeder::class);
        // $this->call(MedicinePrescriptionsTableSeeder::class);
        $this->call(ResultLabTableSeeder::class);
        

        
    }
}
