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

Route::get('/', 'UserController@index');

Route::get('/superadmin/dashboard', 'UserController@dashboard')->name('dashboard');
Route::get('/superadmin/doctor/list', 'SuperAdmin\DoctorController@index')->name('superadmin.doctor.list');

Route::get('/test', function () {
    return 'test 123';
});
