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

Route::get('/superAdmin/admin/create', 'superAdmin\AdminController@create')->name('superAdmin.admin.create');
Route::post('/superAdmin/admin/store', 'superAdmin\AdminController@store')->name('superAdmin.admin.store');
Route::get('/superAdmin/admin/list', 'superAdmin\AdminController@index')->name('superAdmin.admin.list');
Route::get('/superAdmin/admin/edit/{id}', 'superAdmin\AdminController@edit')->name('superAdmin.admin.edit');
Route::post('/superAdmin/admin/update/{id}', 'superAdmin\AdminController@update')->name('superAdmin.admin.update');
Route::delete('/superAdmin/admin/destroy/{id}', 'superAdmin\AdminController@destroy')->name('superAdmin.admin.destroy');

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

Route::get('/admin/', function(){
    return redirect()->route('admin.dashboard');
});

Route::get('/admin/dashboard', 'admin\UserController@Dashboard') ->name('admin.dashboard');
Route::get('/admin/registration/add', 'admin\RegistrationController@create') ->name('admin.registration.create');
Route::get('/admin/registration/list', 'admin\RegistrationController@index') ->name('admin.registration.list');
Route::get('/admin/registration/store', 'admin\RegistrationController@store') ->name('admin.registration.store');
Route::get('/admin/registration/edit/{id}', 'admin\RegistrationController@edit') ->name('admin.registration.edit');
Route::get('/admin/registration/update/{id}', 'admin\RegistrationController@update') ->name('admin.registration.update');
Route::get('/admin/registration/destroy/{id}', 'admin\RegistrationController@destroy') ->name('admin.registration.destroy');

Route::get('/admin/patient/add', 'admin\PatientController@create') ->name('admin.patient.create');
Route::get('/admin/patient/list', 'admin\PatientController@index') ->name('admin.patient.list');
Route::get('/admin/patient/store', 'admin\PatientController@store') ->name('admin.patient.store');
Route::get('/admin/patient/edit/{id}', 'admin\PatientController@edit') ->name('admin.patient.edit');
Route::get('/admin/patient/update/{id}', 'admin\PatientController@update') ->name('admin.patient.update');
Route::get('/admin/patient/destroy/{id}', 'admin\PatientController@destroy') ->name('admin.patient.destroy');


Route::get('/doctor/', function(){
    return redirect()->route('doctor.dashboard');
});
Route::get('/doctor/dashboard', 'doctor\UserController@Dashboard') ->name('doctor.dashboard');
Route::get('/doctor/diagnosis/add', 'doctor\DiagnosisController@add') ->name('doctor.diagnosis.add');
Route::get('/doctor/diagnosis/list', 'doctor\DiagnosisController@Index') ->name('doctor.diagnosis.list');
Route::get('/doctor/diagnosis/create/{id}', 'doctor\DiagnosisController@create') ->name('doctor.diagnosis.create');
Route::post('/doctor/diagnosis/store', 'doctor\DiagnosisController@store') ->name('doctor.diagnosis.store');
Route::get('/doctor/diagnosis/list/edit/{id}', 'doctor\DiagnosisController@edit') ->name('doctor.diagnosis.edit');
Route::post('/doctor/diagnosis/list/{id}', 'doctor\DiagnosisController@update') ->name('doctor.diagnosis.update');
Route::get('/doctor/diagnosis/destroy/{id}', 'doctor\DiagnosisController@destroy')->name('doctor.diagnosis.destroy');
Route::get('/doctor/prescription/show/{id}', 'doctor\DiagnosisController@show') ->name('doctor.prescription.show');

Route::get('/doctor/patient/list', 'PatientsController@Index') ->name('doctor.patient.list');
Route::get('/doctor/patient/detail/{id}', 'PatientsController@show') ->name('doctor.patient.detail');

Route::get('/pharmacist/', function(){
    return redirect()->route('pharmacist.dashboard');
});
Route::get('/pharmacist/dashboard', 'pharmacist\UserController@Dashboard') ->name('pharmacist.dashboard');
Route::get('/pharmacist/prescription/list', 'pharmacist\PrescriptionController@Index') ->name('pharmacist.prescription.list');
Route::get('/pharmacist/medicine/list', 'pharmacist\MedicineController@Index') ->name('pharmacist.medicine.list');
Route::get('/pharmacist/medicine/add', 'pharmacist\MedicineController@create') ->name('pharmacist.medicine.add');
Route::post('/pharmacist/medicine/store', 'pharmacist\MedicineController@store') ->name('pharmacist.medicine.store');
Route::get('/pharmacist/medicine/list/edit/{id}', 'pharmacist\MedicineController@edit') ->name('pharmacist.medicine.edit');
Route::put('/pharmacist/medicine/list/{id}', 'pharmacist\MedicineController@update') ->name('pharmacist.medicine.update');
Route::delete('/pharmacist/medicine/list/delete/{id}','pharmacist\MedicineController@destroy')->name('pharmacist.medicine.delete');
Route::delete('/pharmacist/prescription/list/delete/{id}','pharmacist\PrescriptionController@destroy')->name('pharmacist.prescription.delete');

Route::get('/healthAnalyst/', function(){
    return redirect()->route('healthAnalyst.dashboard');
});
Route::get('/healthAnalyst/dashboard', 'healthAnalyst\UserController@Dashboard') ->name('healthAnalyst.dashboard');
Route::get('/healthAnalyst/create', 'healthAnalyst\ResultLabController@Create') ->name('healthAnalyst.resultLab.create');
Route::post('/healthAnalyst/store', 'healthAnalyst\ResultLabController@Store') ->name('healthAnalyst.resultLab.store');
Route::get('/healthAnalyst/form/{id}', 'healthAnalyst\ResultLabController@Form') ->name('healthAnalyst.resultLab.form');
Route::get('/healthAnalyst/edit/{id}', 'healthAnalyst\ResultLabController@Edit') ->name('healthAnalyst.resultLab.edit');
Route::post('/healthAnalyst/update/{id}', 'healthAnalyst\ResultLabController@Update') ->name('healthAnalyst.resultLab.update');
Route::get('/healthAnalyst/delete/{id}', 'healthAnalyst\ResultLabController@Destroy') ->name('healthAnalyst.resultLab.destroy');

Route::get('/healthAnalyst/list', 'healthAnalyst\ResultLabController@Index') ->name('healthAnalyst.resultLab.list');

Route::get('/testRoute', function () {
    return "Test Route";
});
