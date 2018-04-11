<?php

namespace App\Http\Controllers\pharmacist;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Prescription;
use App\Diagnosis;
use App\MedicinePrescription;
use App\Medicine;
use App\Patient;
use App\Registration;


class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function diag_Index()
    {
        
        $prescriptions = Prescription::orderBy('status','asc')->get();
        // $prescriptions = Prescription::where('status', '=', 'no')->get();
        
        return view('pages.pharmacist.diagnosis.list',compact('prescriptions'));
        // return view('pages.pharmacist.prescription.list',['prescriptions' => $prescriptions,'medicine_prescriptions' => $medipresc]);
    }

    public function update_Index()
    {
        //
        $diagnoses = Diagnosis::all();
        return view('pages.pharmacist.diagnosis.update', compact('diagnoses'));
    }

    public function prescription_Index()
    {
        //
        $prescriptions = Prescription::where('status', '=', 'yes')->get();
        return view('pages.pharmacist.prescription.list',compact('prescriptions'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $diagnoses = Diagnosis::find($id);
        $medicines = Medicine::all();
        return view('pages.pharmacist.diagnosis.proceed', compact('diagnoses','medicines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //
        $diagnoses = Diagnosis::find($id);
        

        $total = 0;
        foreach($request->medicine AS $key => $row){
            $medicine = Medicine::find($row);
            $total += $medicine->price * $request->amount[$key];
        }
        
        $data_prescription = [
            'diagnosis_id' => $diagnoses->id,
            'status' => 'no',
            'total_price' => $total,
        ];
        $prescription = Prescription::create($data_prescription);

        // return dd($request->medicine);
        foreach($request->medicine as $key => $row){
            
            $data_medicineprescription = [
                'prescription_id' => $prescription->id,
                'medicine_id' => $request->medicine[$key],
                'amount' => $request->amount[$key],
                'notation' => $request->notation[$key],
            ];

            $medipres = MedicinePrescription::create($data_medicineprescription);
        }
        
        
        return redirect()->route('pharmacist.diagnosis.update');
    }

    public function create_Prescription($id){
        
        $prescription = Prescription::find($id);
        $medipres = MedicinePrescription::where('prescription_id', '=', $id)->get();
        
        $total = 0;
        foreach($medipres AS $row){
            // $medicine = Medicine::find($row);
            $total += $row->medicine->price * $row->amount;
        }
        return view('pages.pharmacist.diagnosis.accept', compact('prescription','medipres'));

    }

    public function store_Prescription($id){
        
        $prescription = Prescription::where('id', '=', $id)->update(['status' => 'yes']);
        $medipres = MedicinePrescription::where('prescription_id', '=', $id)->get();
        foreach($medipres as $key => $row){
            
            $med[$key] = Medicine::where('id','=', $medipres[$key]->medicine_id)->decrement('stock',$medipres[$key]->amount);
        }
        
        // dd($med);
        // foreach($medicine as $key => $row){
        //     $row->stock = $row->stock - $med_stock;
        // }
        return redirect()->route('pharmacist.prescription.list');

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
        $prescription = Prescription::find($id)->delete();
        
        return redirect()->route('pharmacist.diagnosis.list');
    }
}
