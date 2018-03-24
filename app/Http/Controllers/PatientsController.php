<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;

class PatientsController extends Controller
{
    //
    public function Index(){
        $registrations = Registration::all();
        return view('doctor.patient.patients', compact('registrations'));
    }
    
    public function show($id)
    {
        //
        $registration = Registration::find($id);
        return view('doctor.patient.detail', compact('registration'));
    }
}
