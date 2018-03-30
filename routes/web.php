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

Route::get('/superadmin/', function(){
    return redirect()->route('superadmin.dashboard');
});
Route::get('/superadmin/dashboard', 'superadmin\UserController@Dashboard') ->name('superadmin.dashboard');

Route::get('/superadmin/receptionist/create', 'superadmin\ReceptionistController@create')->name('superadmin.receptionist.create');
Route::post('/superadmin/receptionist/store', 'superadmin\ReceptionistController@store')->name('superadmin.receptionist.store');
Route::get('/superadmin/receptionist/list', 'superadmin\ReceptionistController@index')->name('superadmin.receptionist.list');
Route::get('/superadmin/receptionist/edit/{id}', 'superadmin\ReceptionistController@edit')->name('superadmin.receptionist.edit');
Route::post('/superadmin/receptionist/update/{id}', 'superadmin\ReceptionistController@update')->name('superadmin.receptionist.update');
Route::delete('/superadmin/receptionist/destroy/{id}', 'superadmin\ReceptionistController@destroy')->name('superadmin.receptionist.destroy');

Route::get('/superadmin/doctor/create', 'superadmin\DoctorController@create')->name('superadmin.doctor.create');
Route::post('/superadmin/doctor/store', 'superadmin\DoctorController@store')->name('superadmin.doctor.store');
Route::get('/superadmin/doctor/list', 'superadmin\DoctorController@index')->name('superadmin.doctor.list');
Route::get('/superadmin/doctor/edit/{id}', 'superadmin\DoctorController@edit')->name('superadmin.doctor.edit');
Route::put('/superadmin/doctor/update/{id}', 'superadmin\DoctorController@update')->name('superadmin.doctor.update');
Route::delete('/superadmin/doctor/destroy/{id}', 'superadmin\DoctorController@destroy')->name('superadmin.doctor.destroy');

Route::get('/superadmin/midwife/create', 'superadmin\MidwifeController@create')->name('superadmin.midwife.create');
Route::post('/superadmin/midwife/store', 'superadmin\MidwifeController@store')->name('superadmin.midwife.store');
Route::get('/superadmin/midwife/list', 'superadmin\MidwifeController@index')->name('superadmin.midwife.list');
Route::get('/superadmin/midwife/edit/{id}', 'superadmin\MidwifeController@edit')->name('superadmin.midwife.edit');
Route::put('/superadmin/midwife/update/{id}', 'superadmin\MidwifeController@update')->name('superadmin.midwife.update');
Route::delete('/superadmin/midwife/destroy/{id}', 'superadmin\MidwifeController@destroy')->name('superadmin.midwife.destroy');

Route::get('/superadmin/healthAnalyst/create', 'superadmin\HealthAnalystController@create')->name('superadmin.healthAnalyst.create');
Route::post('/superadmin/healthAnalyst/store', 'superadmin\HealthAnalystController@store')->name('superadmin.healthAnalyst.store');
Route::get('/superadmin/healthAnalyst/list', 'superadmin\HealthAnalystController@index')->name('superadmin.healthAnalyst.list');
Route::get('/superadmin/healthAnalyst/edit/{id}', 'superadmin\HealthAnalystController@edit')->name('superadmin.healthAnalyst.edit');
Route::put('/superadmin/healthAnalyst/update/{id}', 'superadmin\HealthAnalystController@update')->name('superadmin.healthAnalyst.update');
Route::delete('/superadmin/healthAnalyst/destroy/{id}', 'superadmin\HealthAnalystController@destroy')->name('superadmin.healthAnalyst.destroy');

Route::get('/superadmin/pharmacist/create', 'superadmin\PharmacistController@create')->name('superadmin.pharmacist.create');
Route::post('/superadmin/pharmacist/store', 'superadmin\PharmacistController@store')->name('superadmin.pharmacist.store');
Route::get('/superadmin/pharmacist/list', 'superadmin\PharmacistController@index')->name('superadmin.pharmacist.list');
Route::get('/superadmin/pharmacist/edit/{id}', 'superadmin\PharmacistController@edit')->name('superadmin.pharmacist.edit');
Route::put('/superadmin/pharmacist/update/{id}', 'superadmin\PharmacistController@update')->name('superadmin.pharmacist.update');
Route::delete('/superadmin/pharmacist/destroy/{id}', 'superadmin\PharmacistController@destroy')->name('superadmin.pharmacist.destroy');

Route::get('/doctor/', function(){
    return redirect()->route('doctor.dashboard');
});
Route::get('/doctor/dashboard', 'doctor\UserController@Dashboard') ->name('doctor.dashboard');
Route::get('/doctor/diagnosis/add', 'doctor\DiagnosisController@add') ->name('doctor.diagnosis.add');
Route::get('/doctor/diagnosis/list', 'doctor\DiagnosisController@Index') ->name('doctor.diagnosis.list');
Route::get('/doctor/diagnosis/create/{id}', 'doctor\DiagnosisController@create') ->name('doctor.diagnosis.create');
Route::post('/doctor/diagnosis/store', 'doctor\DiagnosisController@store') ->name('doctor.diagnosis.store');
Route::get('/doctor/diagnosis/list/edit/{id}', 'doctor\DiagnosisController@edit') ->name('doctor.diagnosis.edit');
Route::put('/doctor/diagnosis/list/{id}', 'doctor\DiagnosisController@update') ->name('doctor.diagnosis.update');

Route::get('/doctor/patient/list', 'PatientsController@Index') ->name('doctor.patient.list');
Route::get('/doctor/patient/detail/{id}', 'PatientsController@show') ->name('doctor.patient.detail');


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
