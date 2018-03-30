<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicinePrescription;
use App\Medicine;
use App\Prescription;
use App\Diagnosis;
use App\Patient;
use App\Registration;

class MedicinePrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $medicine_prescriptions = MedicinePrescription::all();        
        // $diagnosis_prescription = Prescription::where('diagnosis_id', '=',$id);
       
        $diagnosis = Diagnosis::where('id', '=', $id)->first();
        $registration = Registration::where('id', '=', $diagnosis->registration_id)->first();
        $patient = Patient::where('id', '=', $registration->patient_id)->first();
        $prescriptions = Prescription::all();        

        $prescription = Prescription::where('diagnosis_id','=' , $id)->first();     
       
        $medicine_prescriptions = MedicinePrescription::where('prescription_id', '=', $prescription->id)->get();
        $medicines = Medicine::all();
        // $medicines = Medicine::where('id', '=', $medicine_prescriptions[1]->medicine_id)->get();
        // return dd($medicine_prescriptions);
        // return dd($medicines);

        return view('doctor.prescription.show', compact('prescription', 'patient', 'medicine_prescriptions', 'medicines'));
        // return dd($diagnosis_prescription);


        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
