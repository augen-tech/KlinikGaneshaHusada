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

Route::get('/lab/createResultLab', 'LabController@IndexDiagnoses') ->name('health_analyst.lab.createResultLab');
Route::get('/lab/formResultLab/{id}', 'LabController@Create') ->name('health_analyst.lab.formResultLab');
Route::get('/lab/listResultLab', 'LabController@Index') ->name('health_analyst.lab.listResultLab');

Route::post('/lab/store', 'LabController@Store') ->name('health_analyst.lab.storeResultLab');

Route::get('/testRoute', function () {
    return "Test Route";
});
