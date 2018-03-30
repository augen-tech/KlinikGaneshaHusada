<?php

namespace App\Http\Controllers\doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Diagnosis;
use App\Registration;
use App\Medicine;
use App\MedicinePrescription;
use App\Prescription;

class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $diagnoses = Diagnosis::all();
        return view('doctor.diagnosis.list', compact('diagnoses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $registration = Registration::find($id);
        $medicines = Medicine::all();
        // $medicine_prescriptions = MedicinePrescription::all();
        // $prescription = Prescription::find($medicine_prescriptions->prescription_id);
        return view('doctor.diagnosis.create', compact('registration','medicines'));
    }

    public function add(){
        $registrations = Registration::all();
        return view('doctor.diagnosis.add', compact('registrations'));
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
        $data_diagnosis = [
            'registration_id' => $request->registration_id,
            'result' => $request->result,
            'special_request' => $request->special_request,
        ];        
       
        $diagnosis = Diagnosis::create($data_diagnosis);
       
        //
        //save prescription 

        $data_prescription = [            
            'diagnosis_id' => $diagnosis->id,
            'notation' => $request->notation,
        ];
        $prescription = Prescription::create($data_prescription);

        $data_mp = [            
            'amount' => $diagnosis->id,
        ];
        $prescription = Prescription::create($data_prescription);

        return redirect()->route('doctor.diagnosis.list');
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
        $diagnosis = Diagnosis::find($id);
        $registration = Registration::find($diagnosis->registration_id);
        $medicines = Medicine::all();        
        return view('doctor.diagnosis.create', compact('diagnosis', 'registration','medicines'));
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
        $diagnosis = Diagnosis::find($id);
        $data = [
            'registration_id' => $request->registration_id,
            'result' => $request->result,
        ];

        $diagnosis = Diagnosis::update($data);
        return redirect()->route('doctor.diagnosis.list');

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
        $diagnosis = Diagnosis::find($id)->delete();
        
        return redirect()->route('doctor.diagnosis.list');

    }
}
