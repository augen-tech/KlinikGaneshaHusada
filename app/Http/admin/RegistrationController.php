<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Registration;
use App\Patient;
use Sentinel;

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
        $registrations = Registration::orderBy('id', 'DESC')->get();        
        return view('pages.admin.registration.list', compact('registrations'));
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
        $role1 = Sentinel::findRoleById(3);
        $role2 = Sentinel::findRoleById(4);        
        $doctors = $role1->users()->with('roles')->get();
        $midwifes = $role2->users()->with('roles')->get();
        return view('pages.admin.registration.add', compact ('patients','doctors','midwifes'));
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
        // return dd($request);
        if($request->radio_type == 0)
            $dpjp = $request->doctor_id;
        else
            $dpjp = $request->midwife_id;

        $data=[
            'patient_id'=> $request->patient_id,
            'doctor_id'=> $dpjp,
            'complaint'=> $request->complaint,
            'type' => $request->radio_type,
            'blood_pressure' => $request->blood_pressure,
            'weight'=>$request->weight,
            'high'=>$request->high,           
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
        // return dd ($request);
        $patients = Patient::all();
        $registration = Registration ::find($id);        
        
        $role1 = Sentinel::findRoleById(3); 
        $role2 = Sentinel::findRoleById(4);       
        $doctors = $role1->users()->with('roles')->get();
        $midwifes = $role2->users()->with('roles')->get();
        return view('pages.admin.registration.add',compact('registration','patients','doctors','midwifes'));
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

        // return dd ($request);
    
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
