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
        $this->createRoles();
        $this->createUser();
    }

    public function createRoles()
    {
        Sentinel::getRoleRepository()->createModel()->create
        (
			[
				'name'        => 'SuperAdmin',
                'slug'        => 'superAdmin',
            ]
        );
        Sentinel::getRoleRepository()->createModel()->create
        (
			[
				'name'        => 'Admin',
                'slug'        => 'admin',
            ]
        );

        Sentinel::getRoleRepository()->createModel()->create
        (
			[
				'name'        => 'Doctor',
                'slug'        => 'doctor',
            ]
        );

        Sentinel::getRoleRepository()->createModel()->create
        (
			[
				'name'        => 'Midwife',
                'slug'        => 'midwife',
            ]
        );

        Sentinel::getRoleRepository()->createModel()->create
        (
			[
				'name'        => 'Health Analyst',
                'slug'        => 'healthAnalyst',
            ]
        );

        Sentinel::getRoleRepository()->createModel()->create
        (
			[
				'name'        => 'Pharmacist',
                'slug'        => 'pharmacist',
            ]
        );
    }

    public function createUser()
    {
        $this->createDefaultSuperAdmin();
        $this->createDefaultAdmin();
        $this->createDefaultDoctor();
        $this->createDefaultMidwife();
        $this->createDefaultHealthAnalyst();
        $this->createDefaultPharmacist();
        
        $roleArray = array("admin", "doctor", "midwife", "healthAnalyst", "pharmacist");
        foreach(range(0,20) as $index){
            $faker = Faker::create();
            $credentials = [
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => 'qwerty123',
                'name' => $faker->name,
                'gender' => 'M',
            ];

            $user = Sentinel::registerAndActivate($credentials);
            $role = Sentinel::findRoleBySlug($roleArray[array_rand($roleArray)]);
            $user->roles()->attach($role);
        }
    }

    public function createDefaultSuperAdmin(){
        $credentials = [
            'username' => 'superAdmin',
			'email' => 'superAdmin@example.com',
            'password' => 'qwerty123',
            'name' => 'SuperAdmin',
            'gender' => 'M',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('superAdmin');
        $user->roles()->attach($role);
    }

    public function createDefaultAdmin(){
        $credentials = [
            'username' => 'admin',
			'email' => 'admin@example.com',
            'password' => 'qwerty123',
            'name' => 'Admin',
            'gender' => 'M',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('admin');
        $user->roles()->attach($role);
    }

    public function createDefaultDoctor(){
        $credentials = [
            'username' => 'doctor',
			'email' => 'doctor@example.com',
            'password' => 'qwerty123',
            'name' => 'Doctor',
            'gender' => 'F',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('doctor');
        $user->roles()->attach($role);
    }

    public function createDefaultMidwife(){
        $credentials = [
            'username' => 'midwife',
			'email' => 'midwife@example.com',
            'password' => 'qwerty123',
            'name' => 'Midwife',
            'gender' => 'M',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('midwife');
        $user->roles()->attach($role);
    }

    public function createDefaultHealthAnalyst(){
        $credentials = [
            'username' => 'healthAnalyst',
			'email' => 'healthAnalyst@example.com',
            'password' => 'qwerty123',
            'name' => 'Health Analyst',
            'gender' => 'F',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('healthAnalyst');
        $user->roles()->attach($role);
    }

    public function createDefaultPharmacist(){
        $credentials = [
            'username' => 'pharmacist',
			'email' => 'pharmacist@example.com',
            'password' => 'qwerty123',
            'name' => 'Pharmacist',
            'gender' => 'M',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('pharmacist');
        $user->roles()->attach($role);
    }
}
