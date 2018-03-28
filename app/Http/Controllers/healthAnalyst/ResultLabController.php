<?php

namespace App\Http\Controllers\healthAnalyst;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ResultLab;
use App\Diagnosis;

class ResultLabController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $resultLab = ResultLab::all();
        return view('healthAnalyst.resultLab.list',compact('resultLab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $diagnoses = Diagnosis::all();
        return view('healthAnalyst.resultLab.create',compact('diagnoses'));  
    }

    public function form($id)
    {
        //
        $diagnosis = Diagnosis::find($id);        
        return view('healthAnalyst.resultLab.form',compact('diagnosis'));        
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
        return redirect()->route('healthAnalyst.resultLab.list');
        

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
        return view('healthAnalyst.resultLab.form',compact('resultLab'));  
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
    
        return redirect()->route('healthAnalyst.resultLab.list');
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
        return redirect()->route('healthAnalyst.resultLab.list');
    }
}
