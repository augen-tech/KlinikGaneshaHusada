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

    public function Index1(){
        $patients = Patient::all();
        return view('pages.midwife.patient.list', compact('patients'));
    }
    
    public function show($id)
    {
        // //
        
        $registration = Registration::where('id','=', $id)->get();
        $patient =Patient::where('id','=',$registration->patient_id)->get();
        dd($patient);
        // $diagnosis = Diagnosis::where('registration_id','=', $registration->id)->get();
        // dd($diagnosis);


        return view('pages.doctor.patient.detail', compact('diagnosis','patient', 'registration'));
        
        // $patient = Patient::find($id);
        // $registration = Registration::where('patient_id','=', $id)->get();
        // // dd($registration);
       
        // return view('pages.doctor.patient.detail', compact('patient','registration'));


    }

    public function show1($id)
    {
        // //
        $patient =Patient::find($id);
        $registration = Registration::where('patient_id','=', $id)->get();
        // dd($registration);
        // $diagnosis = Diagnosis::where('registration_id','=', $registration->id)->get();
        // dd($diagnosis);


        return view('pages.midwife.patient.detail', compact('diagnosis','patient', 'registration'));
        
        // $patient = Patient::find($id);
        // $registration = Registration::where('patient_id','=', $id)->get();
        // // dd($registration);
       
        // return view('pages.doctor.patient.detail', compact('patient','registration'));


    }
    public function create($id)
    {
        //
        $registration = Registration::find($id);
        return view('pages.doctor.diagnosis.create', compact('registration'));
    }
}
