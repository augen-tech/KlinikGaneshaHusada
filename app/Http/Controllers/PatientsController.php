<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use App\Patient;
use App\Diagnosis;

class PatientsController extends Controller
{
    //
    public function Index(){
        $patients = Patient::all();
        return view('pages.doctor.patient.list', compact('patients'));
    }
    
    public function show($id)
    {
        // //
        // $registration = Registration::find($id);
        // $patient = Patient::where('id','=', $id)->first();
        // $diagnosis = Diagnosis::where('registration_id','=', $id)->get();

        // return view('pages.doctor.patient.detail', compact('diagnosis','patient', 'registration'));
        
        $patient = Patient::find($id);
        $registration = Registration::where('patient_id','=', $id)->get();
        // dd($registration);
       
        return view('pages.doctor.patient.detail', compact('patient','registration'));


    }
    public function create($id)
    {
        //
        $registration = Registration::find($id);
        return view('pages.doctor.diagnosis.create', compact('registration'));
    }
}
