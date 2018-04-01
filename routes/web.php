<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'UserController@Index') ->name('login');

Route::get('/superAdmin/', function(){
    return redirect()->route('superAdmin.dashboard');
});
Route::get('/superAdmin/dashboard', 'superAdmin\UserController@Dashboard') ->name('superAdmin.dashboard');

Route::get('/superAdmin/receptionist/create', 'superAdmin\ReceptionistController@create')->name('superAdmin.receptionist.create');
Route::post('/superAdmin/receptionist/store', 'superAdmin\ReceptionistController@store')->name('superAdmin.receptionist.store');
Route::get('/superAdmin/receptionist/list', 'superAdmin\ReceptionistController@index')->name('superAdmin.receptionist.list');
Route::get('/superAdmin/receptionist/edit/{id}', 'superAdmin\ReceptionistController@edit')->name('superAdmin.receptionist.edit');
Route::post('/superAdmin/receptionist/update/{id}', 'superAdmin\ReceptionistController@update')->name('superAdmin.receptionist.update');
Route::delete('/superAdmin/receptionist/destroy/{id}', 'superAdmin\ReceptionistController@destroy')->name('superAdmin.receptionist.destroy');

Route::get('/superAdmin/doctor/create', 'superAdmin\DoctorController@create')->name('superAdmin.doctor.create');
Route::post('/superAdmin/doctor/store', 'superAdmin\DoctorController@store')->name('superAdmin.doctor.store');
Route::get('/superAdmin/doctor/list', 'superAdmin\DoctorController@index')->name('superAdmin.doctor.list');
Route::get('/superAdmin/doctor/edit/{id}', 'superAdmin\DoctorController@edit')->name('superAdmin.doctor.edit');
Route::put('/superAdmin/doctor/update/{id}', 'superAdmin\DoctorController@update')->name('superAdmin.doctor.update');
Route::delete('/superAdmin/doctor/destroy/{id}', 'superAdmin\DoctorController@destroy')->name('superAdmin.doctor.destroy');

Route::get('/superAdmin/midwife/create', 'superAdmin\MidwifeController@create')->name('superAdmin.midwife.create');
Route::post('/superAdmin/midwife/store', 'superAdmin\MidwifeController@store')->name('superAdmin.midwife.store');
Route::get('/superAdmin/midwife/list', 'superAdmin\MidwifeController@index')->name('superAdmin.midwife.list');
Route::get('/superAdmin/midwife/edit/{id}', 'superAdmin\MidwifeController@edit')->name('superAdmin.midwife.edit');
Route::put('/superAdmin/midwife/update/{id}', 'superAdmin\MidwifeController@update')->name('superAdmin.midwife.update');
Route::delete('/superAdmin/midwife/destroy/{id}', 'superAdmin\MidwifeController@destroy')->name('superAdmin.midwife.destroy');

Route::get('/superAdmin/healthAnalyst/create', 'superAdmin\HealthAnalystController@create')->name('superAdmin.healthAnalyst.create');
Route::post('/superAdmin/healthAnalyst/store', 'superAdmin\HealthAnalystController@store')->name('superAdmin.healthAnalyst.store');
Route::get('/superAdmin/healthAnalyst/list', 'superAdmin\HealthAnalystController@index')->name('superAdmin.healthAnalyst.list');
Route::get('/superAdmin/healthAnalyst/edit/{id}', 'superAdmin\HealthAnalystController@edit')->name('superAdmin.healthAnalyst.edit');
Route::put('/superAdmin/healthAnalyst/update/{id}', 'superAdmin\HealthAnalystController@update')->name('superAdmin.healthAnalyst.update');
Route::delete('/superAdmin/healthAnalyst/destroy/{id}', 'superAdmin\HealthAnalystController@destroy')->name('superAdmin.healthAnalyst.destroy');

Route::get('/superAdmin/pharmacist/create', 'superAdmin\PharmacistController@create')->name('superAdmin.pharmacist.create');
Route::post('/superAdmin/pharmacist/store', 'superAdmin\PharmacistController@store')->name('superAdmin.pharmacist.store');
Route::get('/superAdmin/pharmacist/list', 'superAdmin\PharmacistController@index')->name('superAdmin.pharmacist.list');
Route::get('/superAdmin/pharmacist/edit/{id}', 'superAdmin\PharmacistController@edit')->name('superAdmin.pharmacist.edit');
Route::put('/superAdmin/pharmacist/update/{id}', 'superAdmin\PharmacistController@update')->name('superAdmin.pharmacist.update');
Route::delete('/superAdmin/pharmacist/destroy/{id}', 'superAdmin\PharmacistController@destroy')->name('superAdmin.pharmacist.destroy');

Route::get('/doctor/', function(){
    return redirect()->route('doctor.dashboard');
});
Route::get('/doctor/dashboard', 'doctor\UserController@Dashboard') ->name('doctor.dashboard');
Route::get('/doctor/diagnosis/add', 'doctor\DiagnosisController@add') ->name('doctor.diagnosis.add');
Route::get('/doctor/diagnosis/list', 'doctor\DiagnosisController@Index') ->name('doctor.diagnosis.list');
Route::get('/doctor/diagnosis/create', 'doctor\DiagnosisController@create') ->name('doctor.diagnosis.create');



Route::get('/pharmacist/', function(){
    return redirect()->route('pharmacist.dashboard');
});
Route::get('/pharmacist/dashboard', 'pharmacist\UserController@Dashboard') ->name('pharmacist.dashboard');
Route::get('/pharmacist/prescription', 'pharmacist\PrescriptionController@Index') ->name('pharmacist.prescription');
Route::get('/pharmacist/medicine/list', 'pharmacist\MedicineController@Index') ->name('pharmacist.medicine.list');
Route::get('/pharmacist/medicine/add', 'pharmacist\MedicineController@create') ->name('pharmacist.medicine.add');
Route::post('/pharmacist/medicine/store', 'pharmacist\MedicineController@store') ->name('pharmacist.medicine.store');
Route::get('/pharmacist/medicine/list/edit/{id}', 'pharmacist\MedicineController@edit') ->name('pharmacist.medicine.edit');
Route::put('/pharmacist/medicine/list/{id}', 'pharmacist\MedicineController@update') ->name('pharmacist.medicine.update');
Route::delete('/pharmacist/delete/{id}','pharmacist\MedicineController@destroy')->name('pharmacist.medicine.delete');

Route::get('/healthAnalyst/', function(){
    return redirect()->route('healthAnalyst.dashboard');
});
Route::get('/healthAnalyst/dashboard', 'healthAnalyst\UserController@Dashboard') ->name('healthAnalyst.dashboard');
Route::get('/healthAnalyst/create', 'healthAnalyst\ResultLabController@Create') ->name('healthAnalyst.resultLab.create');
Route::get('/healthAnalyst/form/{id}', 'healthAnalyst\ResultLabController@form') ->name('healthAnalyst.resultLab.form');
Route::post('/healthAnalyst/store', 'healthAnalyst\ResultLabController@Store') ->name('healthAnalyst.resultLab.store');
Route::get('/healthAnalyst/list', 'healthAnalyst\ResultLabController@Index') ->name('healthAnalyst.resultLab.list');

Route::get('/testRoute', function () {
    return "Test Route";
});
