<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Registration;
use App\Patient;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $registrations = Registration::all();
        return view('admin.registration.list', compact('registrations'));
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
        return view('admin.registration.add', compact ('patients'));
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
            'patient_id'=> $request->patient_id,
            'complaint'=> $request->complaint,
            'type' => $request->type,
            'blood_pressure' => $request->blood_pressure           
        ];

        Registration::create($data);
        return redirect()->route('admin.registration.list');



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
        $patients = Patient::all();
        $registration = Registration ::find($id);        
        return view('admin.registration.add',compact('registration','patients'));
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
        // return dd($request);
        $registration = Registration::findOrFail($id);
              
        
        $input = $request->all();
    
        $registration->fill($input)->save();
        // Session::flash('flash_message', 'Task successfully added!');

        return redirect()->route('admin.registration.list');
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
            $registration = Registration::find($id);
            $registration->delete();
            return redirect()->route('admin.registration.list');
        
    }
}
