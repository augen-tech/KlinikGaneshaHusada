<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patients = Patient::all();
        return view('pages.admin.patient.list', compact('patients'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $patients = Patient::all();
        return view('pages.admin.patient.add', compact('patients'));
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
        $data=[
            'name'=> $request->name,
            'dob'=> $request->dob,
            'address' => $request->address,
            'blood_type' => $request->blood_type,
            'gender' => $request->gender,
            'phone' => $request->phone           
        ];

        Patient::create($data);
        return redirect()->route('admin.patient.list');
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
        
        $patient = Patient :: find($id);
                
        return view('pages.admin.patient.add',compact('patient'));  
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
        $patient = Patient::findOrFail($id);
              
        //cek yang ini
        $input = $request->all();
    
        $patient->fill($input)->save();
        // Session::flash('flash_message', 'Task successfully added!');

        return redirect()->route('admin.patient.list');
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
        $patient = Patient::find($id);
        $patient->delete();
        return redirect()->route('admin.patient.list');
    }
}
