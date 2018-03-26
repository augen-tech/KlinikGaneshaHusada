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

Route::get('/dashboard', 'UserController@DashBoard') ->name('dashboard');

Route::get('/admin/', function(){
    return redirect()->route('admin.dashboard');
});

Route::get('/admin/dashboard', 'admin\UserController@Dashboard') ->name('admin.dashboard');
Route::get('/admin/registration/add', 'admin\RegistrationController@create') ->name('admin.registration.create');
Route::get('/admin/registration/list', 'admin\RegistrationController@index') ->name('admin.registration.list');


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
Route::post('/healthAnalyst/store', 'healthAnalyst\ResultLabController@Store') ->name('healthAnalyst.resultLab.store');
Route::get('/healthAnalyst/form/{id}', 'healthAnalyst\ResultLabController@form') ->name('healthAnalyst.resultLab.form');
Route::get('/healthAnalyst/formEdit/{id}', 'healthAnalyst\ResultLabController@Edit') ->name('healthAnalyst.resultLab.formEdit');
Route::get('/healthAnalyst/formEdit/update', 'healthAnalyst\ResultLabController@Update') ->name('healthAnalyst.resultLab.update');

Route::get('/healthAnalyst/list', 'healthAnalyst\ResultLabController@Index') ->name('healthAnalyst.resultLab.list');

Route::get('/testRoute', function () {
    return "Test Route";
});
