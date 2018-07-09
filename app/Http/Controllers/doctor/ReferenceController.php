<?php

namespace App\Http\Controllers\doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use App\Diagnosis;
use App\Registration;
use App\Medicine;
use App\MedicinePrescription;
use App\Prescription;
use App\Patient;
use App\Reference;
use Validator;
use Storage;

class ReferenceController extends Controller
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

    public function list()
    {
        $diagnoses = Diagnosis::all();
        dd($diagnosis);
        return view('pages.doctor.reference.list', compact('diagnoses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function send($id)
    {
        $diagnosis = Diagnosis::find($id);
        // dd($diagnosis);
        // $reference = Reference::where('diagnosis_id','=',$diagnosis->id)->get();
        // dd($reference);

        return view('pages.doctor.reference.reference', compact('diagnosis','reference'));
    }
    public function add(){
        $diagnoses = Diagnosis::doesntHave('reference')->get(); 
        return view('pages.doctor.reference.addReference', compact('diagnoses'));
    }

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
        $data_rujukan = [
            'diagnosis_id' => $request->diagnosis_id,
            'hospital' => $request->hospital,
            'address' => $request->address,
            'message' => $request->message,
            
        ];      
       
        $reference = Reference::create($data_rujukan);
        // dd($reference);
        
        return redirect()->route('doctor.reference.add');
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
        $data_rujukan = [
            'diagnosis_id' => $request->diagnosis_id,
            'hospital' => $request->hospital,
            'address' => $request->address,
            'message' => $request->message,
            
        ];   
        // dd($data_diagnosis);
        // $diagnosis = Diagnosis::update($data);
        
        $reference->fill($data_rujukan)->save();
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
