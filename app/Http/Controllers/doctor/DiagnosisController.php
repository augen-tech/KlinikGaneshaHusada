<?php

namespace App\Http\Controllers\doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Diagnosis;
use App\Registration;
use App\Medicine;
use App\MedicinePrescription;
use App\Prescription;
use App\Patient;

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
        return view('pages.doctor.diagnosis.list', compact('diagnoses'));
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
        return view('pages.doctor.diagnosis.create', compact('registration','medicines'));
    }

    public function add(){
        $registrations = Registration::all();
        return view('pages.doctor.diagnosis.add', compact('registrations'));
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
        ];
        $prescription = Prescription::create($data_prescription);

        
            
        foreach ($request->medicine as $index => $row) {            
            $data_mp = [       
                'prescription_id' => $prescription->id,
                'medicine_id' => $request->medicine[$index], 
                'amount' => $request->amount[$index],
                'notation' => $request->notation[$index],
            ];
            $medicine_prescription = MedicinePrescription::create($data_mp);    
        }

        
       
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
        
        return view('pages.doctor.prescription.show', compact('prescription', 'patient', 'medicine_prescriptions', 'medicines'));
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
        $diagnosis = Diagnosis::find($id);
        $registration = Registration::find($diagnosis->registration_id);
        $medicines = Medicine::all();
        $prescription = Prescription::where('diagnosis_id', '=', $id)->first();
        $medicine_prescriptions = MedicinePrescription::where('prescription_id', '=', $prescription->id)->get();
        
        $medicines_ = array();

        foreach ($medicine_prescriptions as $row) {            
            $tempmedicines_ = Medicine::where('id', '=', $row->medicine_id)->first();
            array_push($medicines_, $tempmedicines_);
        }



        // return dd($medicine_prescriptions);
        // return dd($medicines_);
        
        
        return view('pages.doctor.diagnosis.create', compact('diagnosis', 'registration','medicines','prescription', 'medicine_prescriptions','medicines_'));
        
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
        $prescription = Prescription::where('diagnosis_id','=' , $id)->first();
        $medicine_prescriptions = MedicinePrescription::where('prescription_id', '=', $prescription->id)->get();

        $data_diagnosis = [
            'registration_id' => $request->registration_id,
            'result' => $request->result,
            'special_request' => $request->special_request,
        ];

        // $diagnosis = Diagnosis::update($data);
        
        $diagnosis->fill($data_diagnosis)->save();

        $data_prescription = [            
            'diagnosis_id' => $prescription->diagnosis_id,
        ];
       
        $prescription->fill($data_prescription)->save();
        
        foreach ($request->medicine as $index => $row) {            
            $data_mp = [       
                'prescription_id' => $prescription->id,
                'medicine_id' => $request->medicine[$index], 
                'amount' => $request->amount[$index],
                'notation' => $request->notation[$index],
            ];
             
            $medicine_prescriptions[$index]->fill($data_mp)->save();
            // $medicine_prescriptions = MedicinePrescription::update($data_mp->$request);
            // $medicine_prescriptions = MedicinePrescription::whereId($id)->update($index->all());; 
            // $medicine_prescriptions->update($data_mp);  
        }
        
        $prescription = Prescription::where('diagnosis_id', '=', $id)->first();
        $medicine_prescriptions = MedicinePrescription::where('prescription_id', '=', $prescription->id)->delete();
       
        // return dd($medicine_prescriptions);
        foreach ($request->medicine as $index => $row) {            
            $data_mp = [       
                'prescription_id' => $prescription->id,
                'medicine_id' => $request->medicine[$index], 
                'amount' => $request->amount[$index],
                'notation' => $request->notation[$index],
            ];
            $medicine_prescriptions = MedicinePrescription::create($data_mp);    
        }
        

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
