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

Route::get('/', 'UserController@Index')->name('home');
Route::post('/logout', 'UserController@postLogout')->name('postLogout');

Route::group(['middleware' => 'visitor'], function() {
    Route::get('/login', 'UserController@login')->name('login');
    Route::post('/login', 'UserController@postLogin')->name('postLogin');

});

Route::group(['middleware' => 'superAdmin'], function() {
    Route::get('/superAdmin/', function(){
        return redirect()->route('superAdmin.dashboard');
    });
    Route::get('/superadmin/dashboard', 'superAdmin\UserController@Dashboard') ->name('superAdmin.dashboard');

    Route::resource('superadmin/admin', 'superAdmin\AdminController', ['names' => [
        'index'   => 'superAdmin.admin.list',
        'show'    => 'superAdmin.admin.show',
        'create'  => 'superAdmin.admin.create',
        'store'   => 'superAdmin.admin.store',
        'edit'    => 'superAdmin.admin.edit',
        'update'  => 'superAdmin.admin.update',
        'destroy' => 'superAdmin.admin.destroy'
    ]]);

    Route::resource('superadmin/doctor', 'superAdmin\DoctorController', ['names' => [
        'index'   => 'superAdmin.doctor.list',
        'show'    => 'superAdmin.doctor.show',
        'create'  => 'superAdmin.doctor.create',
        'store'   => 'superAdmin.doctor.store',
        'edit'    => 'superAdmin.doctor.edit',
        'update'  => 'superAdmin.doctor.update',
        'destroy' => 'superAdmin.doctor.destroy'
    ]]);

    Route::resource('superadmin/midwife', 'superAdmin\MidwifeController', ['names' => [
        'index'   => 'superAdmin.midwife.list',
        'show'    => 'superAdmin.midwife.show',
        'create'  => 'superAdmin.midwife.create',
        'store'   => 'superAdmin.midwife.store',
        'edit'    => 'superAdmin.midwife.edit',
        'update'  => 'superAdmin.midwife.update',
        'destroy' => 'superAdmin.midwife.destroy'
    ]]);

    Route::resource('superadmin/healthanalyst', 'superAdmin\HealthAnalystController', ['names' => [
        'index'   => 'superAdmin.healthAnalyst.list',
        'show'    => 'superAdmin.healthAnalyst.show',
        'create'  => 'superAdmin.healthAnalyst.create',
        'store'   => 'superAdmin.healthAnalyst.store',
        'edit'    => 'superAdmin.healthAnalyst.edit',
        'update'  => 'superAdmin.healthAnalyst.update',
        'destroy' => 'superAdmin.healthAnalyst.destroy'
    ]]);

    Route::resource('superadmin/pharmacist', 'superAdmin\PharmacistController', ['names' => [
        'index'   => 'superAdmin.pharmacist.list',
        'show'    => 'superAdmin.pharmacist.show',
        'create'  => 'superAdmin.pharmacist.create',
        'store'   => 'superAdmin.pharmacist.store',
        'edit'    => 'superAdmin.pharmacist.edit',
        'update'  => 'superAdmin.pharmacist.update',
        'destroy' => 'superAdmin.pharmacist.destroy'
    ]]);

});

Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin/', function(){
        return redirect()->route('admin.dashboard');
    });

    Route::get('/admin/dashboard', 'admin\UserController@Dashboard') ->name('admin.dashboard');
    Route::get('/admin/registration/add', 'admin\RegistrationController@create') ->name('admin.registration.create');
    Route::get('/admin/registration/list', 'admin\RegistrationController@index') ->name('admin.registration.list');
    Route::post('/admin/registration/store', 'admin\RegistrationController@store') ->name('admin.registration.store');
    Route::get('/admin/registration/edit/{id}', 'admin\RegistrationController@edit') ->name('admin.registration.edit');
    Route::post('/admin/registration/update/{id}', 'admin\RegistrationController@update') ->name('admin.registration.update');
    Route::get('/admin/registration/destroy/{id}', 'admin\RegistrationController@destroy') ->name('admin.registration.destroy');

    // Route::get('/admin/patient/add', 'admin\PatientController@create') ->name('admin.patient.create');
    Route::get('/admin/patient/addPatient/child', 'admin\PatientController@createchild') ->name('admin.patient.createchild');
    Route::get('/admin/patient/addPatient/adult', 'admin\PatientController@createadult') ->name('admin.patient.createadult');
    
    // Route::get('/admin/patient/list', 'admin\PatientController@index') ->name('admin.patient.list');
    Route::get('/admin/patient/listPatient/adult', 'admin\PatientController@indexadult') ->name('admin.patient.listadult');
    Route::get('/admin/patient/listPatient/child', 'admin\PatientController@indexchild') ->name('admin.patient.listchild');

    Route::post('/admin/patient/store', 'admin\PatientController@store') ->name('admin.patient.store');

    Route::get('/admin/patient/editchild/{id}', 'admin\PatientController@editchild') ->name('admin.patient.editchild');
    Route::get('/admin/patient/editadult/{id}', 'admin\PatientController@editadult') ->name('admin.patient.editadult');

    Route::post('/admin/patient/update/{id}', 'admin\PatientController@update') ->name('admin.patient.update');

    Route::get('/admin/patient/destroychild/{id}', 'admin\PatientController@destroychild') ->name('admin.patient.destroychild');
    Route::get('/admin/patient/destroyadult/{id}', 'admin\PatientController@destroyadult') ->name('admin.patient.destroyadult');
});

Route::group(['middleware' => 'doctor'], function() {
    Route::get('/doctor/', function(){
        return redirect()->route('doctor.dashboard');
    });
    Route::get('/doctor/dashboard', 'doctor\UserController@Dashboard') ->name('doctor.dashboard');
    Route::get('/doctor/diagnosis/add', 'doctor\DiagnosisController@add') ->name('doctor.diagnosis.add');
    Route::get('/doctor/diagnosis/add1', 'doctor\DiagnosisController@add1') ->name('doctor.diagnosis.add1');
    Route::get('/doctor/diagnosis/list', 'doctor\DiagnosisController@Index') ->name('doctor.diagnosis.list');
    Route::get('/doctor/diagnosis/create/{id}', 'doctor\DiagnosisController@create') ->name('doctor.diagnosis.create');
    Route::get('/doctor/diagnosis/create1/{id}', 'doctor\DiagnosisController@create1') ->name('doctor.diagnosis.create1');
    Route::post('/doctor/diagnosis/store', 'doctor\DiagnosisController@store') ->name('doctor.diagnosis.store');
    Route::get('/doctor/diagnosis/list/edit/{id}', 'doctor\DiagnosisController@edit') ->name('doctor.diagnosis.edit');
    Route::post('/doctor/diagnosis/list/{id}', 'doctor\DiagnosisController@update') ->name('doctor.diagnosis.update');
    Route::get('/doctor/diagnosis/destroy/{id}', 'doctor\DiagnosisController@destroy')->name('doctor.diagnosis.destroy');
    Route::get('/doctor/diagnosis/download/{evidence}', 'doctor\DiagnosisController@download') ->name('doctor.diagnosis.download');
    Route::get('/doctor/diagnosis/detail/{id}', 'doctor\DiagnosisController@show') ->name('doctor.diagnosis.detail');
    Route::get('/doctor/diagnosis/detail2/{id}', 'doctor\DiagnosisController@show2') ->name('doctor.diagnosis.detail2');

    // Route::get('/doctor/patient/list', 'PatientsController@Index') ->name('doctor.patient.list');
    Route::get('/doctor/patient/detail/{id}', 'PatientsController@show') ->name('doctor.patient.detail');
});

Route::group(['middleware' => 'midwife'], function() {
    Route::get('/midwife/', function(){
        return redirect()->route('midwife.dashboard');
    });
    Route::get('/midwife/dashboard', 'midwife\UserController@Dashboard') ->name('midwife.dashboard');
    Route::get('/midwife/diagnosis/add', 'midwife\DiagnosisController@add') ->name('midwife.diagnosis.add');
    Route::get('/midwife/diagnosis/add1', 'midwife\DiagnosisController@add1') ->name('midwife.diagnosis.add1');
    Route::get('/midwife/diagnosis/list', 'midwife\DiagnosisController@Index') ->name('midwife.diagnosis.list');
    Route::get('/midwife/diagnosis/create/{id}', 'midwife\DiagnosisController@create') ->name('midwife.diagnosis.create');
    Route::get('/midwife/diagnosis/create1/{id}', 'midwife\DiagnosisController@create1') ->name('midwife.diagnosis.create1');
    Route::post('/midwife/diagnosis/store', 'midwife\DiagnosisController@store') ->name('midwife.diagnosis.store');
    Route::get('/midwife/diagnosis/list/edit/{id}', 'midwife\DiagnosisController@edit') ->name('midwife.diagnosis.edit');
    Route::post('/midwife/diagnosis/list/{id}', 'midwife\DiagnosisController@update') ->name('midwife.diagnosis.update');
    Route::get('/midwife/diagnosis/destroy/{id}', 'midwife\DiagnosisController@destroy')->name('midwife.diagnosis.destroy');
    Route::get('/midwife/diagnosis/download/{evidence}', 'midwife\DiagnosisController@download') ->name('midwife.diagnosis.download');
    Route::get('/midwife/diagnosis/detail/{id}', 'midwife\DiagnosisController@show') ->name('midwife.diagnosis.detail');
    Route::get('/midwife/diagnosis/detail2/{id}', 'midwife\DiagnosisController@show2') ->name('midwife.diagnosis.detail2');

    Route::get('/midwife/patient/list', 'PatientsController@Index1') ->name('midwife.patient.list');
    Route::get('/midwife/patient/detail/{id}', 'PatientsController@show1') ->name('midwife.patient.detail');
});

Route::group(['middleware' => 'healthAnalyst'], function() {
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
    Route::get('/healthAnalyst/list/{onPatientList}', 'healthAnalyst\ResultLabController@Index') ->name('healthAnalyst.resultLab.list');    
});

Route::group(['middleware' => 'pharmacist'], function() {
    Route::get('/pharmacist/', function(){
        return redirect()->route('pharmacist.dashboard');
    });
    Route::get('/pharmacist/dashboard', 'pharmacist\UserController@Dashboard') ->name('pharmacist.dashboard');
    
    Route::get('/pharmacist/diagnosis/update', 'pharmacist\PrescriptionController@update_Index') ->name('pharmacist.diagnosis.update');
    Route::get('/pharmacist/diagnosis/update/proceed/{id}', 'pharmacist\PrescriptionController@create') ->name('pharmacist.diagnosis.proceed');
    Route::post('/pharmacist/diagnosis/store/{id}', 'pharmacist\PrescriptionController@store') ->name('pharmacist.diagnosis.store');

    Route::get('/pharmacist/prescription/list', 'pharmacist\PrescriptionController@prescription_Index') ->name('pharmacist.prescription.list');
    Route::get('/pharmacist/prescription/confirm', 'pharmacist\PrescriptionController@confirm_Index') ->name('pharmacist.prescription.confirm');
    Route::delete('/pharmacist/prescription/confirm/delete/{id}','pharmacist\PrescriptionController@destroy')->name('pharmacist.prescription.delete');
    Route::get('/pharmacist/prescription/confirm/accept/{id}', 'pharmacist\PrescriptionController@create_Prescription') ->name('pharmacist.prescription.accept');
    Route::get('/pharmacist/prescription/list/store/{id}', 'pharmacist\PrescriptionController@store_Prescription') ->name('pharmacist.prescription.store');

    Route::get('/pharmacist/medicine/list', 'pharmacist\MedicineController@Index') ->name('pharmacist.medicine.list');
    Route::get('/pharmacist/medicine/add', 'pharmacist\MedicineController@create') ->name('pharmacist.medicine.add');
    Route::get('/pharmacist/medicine/list/edit/{id}', 'pharmacist\MedicineController@edit') ->name('pharmacist.medicine.edit');
    Route::put('/pharmacist/medicine/list/{id}', 'pharmacist\MedicineController@update') ->name('pharmacist.medicine.update');
    Route::post('/pharmacist/medicine/store', 'pharmacist\MedicineController@store') ->name('pharmacist.medicine.store');    
    Route::delete('/pharmacist/medicine/list/delete/{id}','pharmacist\MedicineController@destroy')->name('pharmacist.medicine.delete');
    
});

Route::get('/testRoute', function () {
    return "Test Route";
});
