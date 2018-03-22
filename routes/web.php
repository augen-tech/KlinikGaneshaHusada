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

Route::get('/doctor/dashboard', 'DiagnosisController@Index') ->name('doctor.dashboard');
Route::get('/doctor/diagnosis/add', 'DiagnosisController@add') ->name('doctor.diagnosis.add');
Route::get('/doctor/diagnosis/list', 'DiagnosisController@Index') ->name('doctor.diagnosis.list');
Route::get('/doctor/diagnosis/create', 'DiagnosisController@create') ->name('doctor.diagnosis.create');

Route::get('/testRoute', function () {
    return "Test Route";
});
