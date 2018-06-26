<?php

namespace App\Http\Controllers\midwife;

use \Input as Input;
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
        
        return view('pages.midwife.diagnosis.list', compact('diagnoses'));
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
        return view('pages.midwife.diagnosis.create', compact('registration','medicines'));
    }

    public function add(){

        $tempregistrations = Registration::doesntHave('diagnosis'); 
        $registrations = $tempregistrations->where('type','=',1)->get();   
        
        return view('pages.midwife.diagnosis.add', compact('registrations'));
    }

    public function add1(){
        $tempregistrations = Registration::doesntHave('diagnosis'); 
        $registrations = $tempregistrations->where('type','=',1)->get();
        return view('pages.midwife.diagnosis.add1', compact('registrations'));
    }

    public function create1($id)
    {
        //
        
        $registration = Registration::find($id);
        $medicines = Medicine::all();
        // $medicine_prescriptions = MedicinePrescription::all();
        // $prescription = Prescription::find($medicine_prescriptions->prescription_id);
        return view('pages.midwife.diagnosis.create1', compact('registration','medicines'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->file)){
            $rules = [
                'evidence'                  => 'required',
            ];
            
                $uploadedFile = $request->file('file');

                $path = $uploadedFile->store('public/files');
    
                $data_diagnosis = [
                    'registration_id' => $request->registration_id,
                    'special_request' => $request->radio,
                    'field_sr' => $request->field_sr,
                    'evidence' => $path,
                    'price' => $request->price,
                ];

                $diagnosis = Diagnosis::create($data_diagnosis);
        
                // $data_registration = [
                //     'state' => 1,
                // ];
    
                // $registration = Registration::find($diagnosis->registration->id);
                // $registration->update($data_registration);
    
                
                // return redirect()->route('doctor.diagnosis.list');
            
            
        } else {
            $data_diagnosis = [
                'registration_id' => $request->registration_id,
                'special_request' => $request->radio,
                'subject' => $request->subject,
                'object' => $request->object,
                'assesment' => $request->assesment,
                'planning' => $request->planning,
                'field_sr' => $request->field_sr,
                'price' => $request->price,
            ];      
           
            $diagnosis = Diagnosis::create($data_diagnosis);
        

            // $registration = Registration::find($diagnosis->registration->id);
            // $registration->update($data_registration);
        }

            // $diagnoses = Diagnosis::find($id);

            $subtotal = 0;
            foreach($request->medicine AS $key => $row){
                $medicine = Medicine::find($row);
                $subtotal += $medicine->price * $request->amount[$key];
            }

            if($diagnosis->special_request != null){
                $subtotal += 100000;
            }else{
                $subtotal += 50000;
            }

            $tax = $subtotal * 0.1;
            $total = $subtotal + $tax;

            $data_prescription = [
                'diagnosis_id' => $diagnosis->id,
                'status' => 'no',
                'total_price' => $total,
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

       
        return redirect()->route('midwife.diagnosis.list');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show2($id)
    {
        //
        
        $diagnosis = Diagnosis::find($id);
        $registration = Registration::where('id', '=', $diagnosis->registration_id)->first();
        $patient = Patient::where('id', '=', $registration->patient_id)->first();
        
        $prescriptions = Prescription::all();        

        $prescription = Prescription::where('diagnosis_id','=' , $id)->first();     
       
        $medicine_prescriptions = MedicinePrescription::where('prescription_id', '=', $prescription->id)->get();
        $medicines = Medicine::all();
        // $medicines = Medicine::where('id', '=', $medicine_prescriptions[1]->medicine_id)->get();
        // return dd($medicine_prescriptions);
        // return dd($medicines);
        return view('pages.midwife.diagnosis.detail2', compact('patient', 'registration','diagnosis', 'prescription','medicine_prescriptions', 'medicines'));
    }

    public function show($id)
    {
        //
        $diagnosis = Diagnosis::find($id);
        $patient = Patient::where('id','=', $diagnosis->registration->patient->id)->first();
        $registration = Registration::where('patient_id','=', $patient->id)->get();
        
        return view('pages.midwife.diagnosis.detail', compact('patient', 'registration','diagnosis'));

        // $diagnosis = Diagnosis::where('id', '=', $id)->first();
        // $registration = Registration::where('id', '=', $diagnosis->registration_id)->first();
        // $patient = Patient::where('id', '=', $registration->patient_id)->first();
        // $prescriptions = Prescription::all();        

        // $prescription = Prescription::where('diagnosis_id','=' , $id)->first();     
       
        // $medicine_prescriptions = MedicinePrescription::where('prescription_id', '=', $prescription->id)->get();
        // $medicines = Medicine::all();
        // // $medicines = Medicine::where('id', '=', $medicine_prescriptions[1]->medicine_id)->get();
        // // return dd($medicine_prescriptions);
        // // return dd($medicines);
        
        // return view('pages.midwife.prescription.show', compact('prescription', 'patient', 'medicine_prescriptions', 'medicines'));
        // // return dd($diagnosis_prescription);       
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
        $medicines = Medicine::all();
        $diagnosis = Diagnosis::where('id', '=', $id)->first();
        $registration = Registration::where('id', '=', $diagnosis->registration_id)->first();
        $patient = Patient::where('id', '=', $registration->patient_id)->first();

        $prescription = Prescription::where('diagnosis_id', '=', $id)->first();
        $medicine_prescriptions = MedicinePrescription::where('prescription_id', '=', $prescription->id)->get();
        
        $medicines_ = array();

        foreach ($medicine_prescriptions as $row) {            
            $tempmedicines_ = Medicine::where('id', '=', $row->medicine_id)->first();
            array_push($medicines_, $tempmedicines_);
        }
        // dd(isset($tempdiagnosis));
        
        if (isset($diagnosis->evidence)){
            return view('pages.midwife.diagnosis.create  ', compact('registration','diagnosis', 'patient','medicines','prescription', 'medicine_prescriptions','medicines_'));
        
        }else{
            return view('pages.midwife.diagnosis.create1  ', compact('registration','diagnosis', 'patient','medicines','prescription', 'medicine_prescriptions','medicines_'));

        }
        
        // $diagnosis = Diagnosis::find($id);
        // $registration = Registration::find($diagnosis->registration_id);
        // $medicines = Medicine::all();
        // $prescription = Prescription::where('diagnosis_id', '=', $id)->first();
        // $medicine_prescriptions = MedicinePrescription::where('prescription_id', '=', $prescription->id)->get();
        
        // $medicines_ = array();

        // foreach ($medicine_prescriptions as $row) {            
        //     $tempmedicines_ = Medicine::where('id', '=', $row->medicine_id)->first();
        //     array_push($medicines_, $tempmedicines_);
        // }



        // // return dd($medicine_prescriptions);
        // // return dd($medicines_);
        
        
        // return view('pages.midwife.diagnosis.create', compact('diagnosis', 'registration','medicines','prescription', 'medicine_prescriptions','medicines_'));
        
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
        if (isset($request->file)){
        
            Storage::delete($diagnosis->evidence);
            $uploadedFile = $request->file('file');

            $path = $uploadedFile->store('public/files');
            // $md5Name = md5_file($request->file('file')->getRealPath());
            // $guessExtension = $request->file('file')->guessExtension();
            // $request->file->storeAs('file', $md5Name . '.' . $guessExtension);

            // $prescription = Prescription::where('diagnosis_id','=' , $id)->first();
            // $medicine_prescriptions = MedicinePrescription::where('prescription_id', '=', $prescription->id)->get();

            $data_diagnosis = [
                'registration_id' => $request->registration_id,
                'special_request' => $request->radio,
                'evidence' => $path,
            ];

            // $diagnosis = Diagnosis::update($data);
            
            $diagnosis->fill($data_diagnosis)->save();
        }else{

            // $diagnosis = Diagnosis::find($id); 
            // $prescription = Prescription::where('diagnosis_id','=' , $id)->first();
            // $medicine_prescriptions = MedicinePrescription::where('prescription_id', '=', $prescription->id)->get();

            $data_diagnosis = [
                'registration_id' => $request->registration_id,
                'special_request' => $request->radio,
                'subject' => $request->subject,
                'object' => $request->object,
                'assesment' => $request->assesment,
                'planning' => $request->planning,
                'price' => $request->price,
            ];
            // dd($data_diagnosis);
            // $diagnosis = Diagnosis::update($data);
            
            $diagnosis->fill($data_diagnosis)->save();
        }
        
        // $md5Name = md5_file($request->file('file')->getRealPath());
        // $guessExtension = $request->file('file')->guessExtension();
        // $request->file->storeAs('file', $md5Name . '.' . $guessExtension);

        // $diagnosis = Diagnosis::find($id); 
        // // $prescription = Prescription::where('diagnosis_id','=' , $id)->first();
        // // $medicine_prescriptions = MedicinePrescription::where('prescription_id', '=', $prescription->id)->get();

        // $data_diagnosis = [
        //     'registration_id' => $request->registration_id,
        //     'special_request' => $request->radio,
        //     'evidence' => $md5Name . '.' . $guessExtension,
        // ];

        // // $diagnosis = Diagnosis::update($data);
        
        // $diagnosis->fill($data_diagnosis)->save();

        // $data_prescription = [            
        //     'diagnosis_id' => $prescription->diagnosis_id,
        // ];
       
        // $prescription->fill($data_prescription)->save();
        
        // foreach ($request->medicine as $index => $row) {            
        //     $data_mp = [       
        //         'prescription_id' => $prescription->id,
        //         'medicine_id' => $request->medicine[$index], 
        //         'amount' => $request->amount[$index],
        //         'notation' => $request->notation[$index],
        //     ];
             
        //     $medicine_prescriptions[$index]->fill($data_mp)->save();
        //     // $medicine_prescriptions = MedicinePrescription::update($data_mp->$request);
        //     // $medicine_prescriptions = MedicinePrescription::whereId($id)->update($index->all());; 
        //     // $medicine_prescriptions->update($data_mp);  
        // }
        
        // $prescription = Prescription::where('diagnosis_id', '=', $id)->first();
        // $medicine_prescriptions = MedicinePrescription::where('prescription_id', '=', $prescription->id)->delete();
       
        // // return dd($medicine_prescriptions);
        // foreach ($request->medicine as $index => $row) {            
        //     $data_mp = [       
        //         'prescription_id' => $prescription->id,
        //         'medicine_id' => $request->medicine[$index], 
        //         'amount' => $request->amount[$index],
        //         'notation' => $request->notation[$index],
        //     ];
        //     $medicine_prescriptions = MedicinePrescription::create($data_mp);    
        // }
        

        return redirect()->route('midwife.diagnosis.list');

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
        
        return redirect()->route('midwife.diagnosis.list');

    }

    public function download($evidence)
    {
        return "wey";
        // $diagnosis = Diagnosis::find($id);    
    }
}
