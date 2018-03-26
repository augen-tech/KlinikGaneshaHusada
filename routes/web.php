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
Route::get('/superadmin/receptionist/create', 'superadmin\ReceptionistController@create')->name('superadmin.receptionist.create');
Route::post('/superadmin/receptionist/store', 'superadmin\ReceptionistController@store')->name('superadmin.receptionist.store');
Route::get('/superadmin/receptionist/list', 'superadmin\ReceptionistController@index')->name('superadmin.receptionist.list');
Route::get('/superadmin/receptionist/edit/{id}', 'superadmin\ReceptionistController@edit')->name('superadmin.receptionist.edit');
Route::post('/superadmin/receptionist/update/{id}', 'superadmin\ReceptionistController@update')->name('superadmin.receptionist.update');
Route::delete('/superadmin/receptionist/destroy/{id}', 'superadmin\ReceptionistController@destroy')->name('superadmin.receptionist.destroy');

Route::get('/superadmin/dashboard', 'superadmin\UserController@Dashboard') ->name('superadmin.dashboard');
Route::get('/superadmin/doctor/create', 'superadmin\DoctorController@create')->name('superadmin.doctor.create');
Route::post('/superadmin/doctor/store', 'superadmin\DoctorController@store')->name('superadmin.doctor.store');
Route::get('/superadmin/doctor/list', 'superadmin\DoctorController@index')->name('superadmin.doctor.list');
Route::get('/superadmin/doctor/edit/{id}', 'superadmin\DoctorController@edit')->name('superadmin.doctor.edit');
Route::put('/superadmin/doctor/update/{id}', 'superadmin\DoctorController@update')->name('superadmin.doctor.update');
Route::delete('/superadmin/doctor/destroy/{id}', 'superadmin\DoctorController@destroy')->name('superadmin.doctor.destroy');

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
