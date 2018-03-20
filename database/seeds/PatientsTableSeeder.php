<?php

use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach(range(0,10) as $index){
            DB::table('patients')->insert([
                'name' => 'Akbar ',
                'address' => 'Jl. FachDes',
                'blood_type' => 'O',
                'gender' => 'M',
                'phone' => '081234567890',
                
            ]);
        }
        
    }
}
