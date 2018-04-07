<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use App\Patient;

class PatientsController extends Controller
{
    //
    public function Index(){
        $patients = Patient::all();
        return view('pages.doctor.patient.list', compact('patients'));
    }
    
    public function show($id)
    {
        //
        $patient = Patient::find($id);
        return view('pages.doctor.patient.detail', compact('patient'));
    }
    public function create($id)
    {
        //
        $registration = Registration::find($id);
        return view('pages.doctor.diagnosis.create', compact('registration'));
    }
}
