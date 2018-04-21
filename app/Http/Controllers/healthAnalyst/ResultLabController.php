<?php

namespace App\Http\Controllers\healthAnalyst;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ResultLab;
use App\Diagnosis;
use App\Patient;

class ResultLabController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($onPatientList)
    {
        //
        $resultLabs = ResultLab::all();
        $patients = Patient::all();

        if($onPatientList == 1){
            return view('pages.healthAnalyst.resultLab.list',compact('resultLabs','patients'));
        }else{
            return view('pages.healthAnalyst.resultLab.list',compact('resultLabs'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $diagnoses = Diagnosis::doesntHave('resultLab', function ($query) {
        //     $query->where('special_request', '=', 1);
        // })->orderBy('created_at','ASC')->get();              

        $tempDiagnoses = Diagnosis::doesntHave('resultLab');    
        $diagnoses = $tempDiagnoses->where('special_request', '=', 1)->orderBy('created_at','ASC')->get();

        // $diagnoses = Diagnosis::doesntHave('resultLab','and', function($q){
        //     $q->where('special_request', '=', 1);
        // })->orderBy('created_at','ASC')->get();        

        // $diagnoses = Diagnosis::doesntHave('resultLab', 'and', function ($q) {
        //     $q->where('special_request', '=', 1);
        // });
                    
        return view('pages.healthAnalyst.resultLab.create',compact('diagnoses'));  
    }

    public function form($id)
    {
        //
        $diagnosis = Diagnosis::find($id);        
        return view('pages.healthAnalyst.resultLab.form',compact('diagnosis'));        
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
        // return dd($request->all());
        $data = [
            'diagnosis_id' => $request->diagnosis_id,
            'result' => $request->result
        ];

        ResultLab::create($data);
        return redirect()->route('healthAnalyst.resultLab.list',0);
        

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
        
        $resultLab = ResultLab::find($id);        
        return view('pages.healthAnalyst.resultLab.form',compact('resultLab'));  
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
        $resultLab = ResultLab::findOrFail($id);
              
        
        $input = $request->all();
    
        $resultLab->fill($input)->save();
        // Session::flash('flash_message', 'Task successfully added!');
    
        return redirect()->route('healthAnalyst.resultLab.list',0);
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
        $resultLab = ResultLab::find($id);
        $resultLab->delete();
        return redirect()->route('healthAnalyst.resultLab.list',0);
    }
}
