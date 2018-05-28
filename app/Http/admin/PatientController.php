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
    public function indexchild()
    {
        //
        $patients = Patient::all();
        // return view('pages.admin.patient.list', compact('patients'));
        return view('pages.admin.patient.listPatient.child', compact('patients'));
    }

    public function indexadult()
    {
        //
        $patients = Patient::all();
        // return view('pages.admin.patient.list', compact('patients'));
        return view('pages.admin.patient.listPatient.adult', compact('patients'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createchild()
    {
        //
        
        // return view('pages.admin.patient.add', compact('patients'));
        return view('pages.admin.patient.addPatient.child');
    }

    public function createadult()
    {
        //
       
        // return view('pages.admin.patient.add', compact('patients'));
        return view('pages.admin.patient.addPatient.adult');
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
        $data=[
            'name'=> $request->name,
            'dob'=> $request->dob,
            'address' => $request->address,
            'blood_type' => $request->blood,
            'gender' => $request->gender,
            'phone' => $request->phone,

            //anak
            'parent_name' => $request->parent_name,
            'parent_job' => $request->parent_job,
            'child_order' => $request->child_order,
            'birth_weight' => $request->birth_weight,
            'birth_attendant' =>$request->birth_attendant,
            'labor_method' =>$request->labor_method,

            //adult
            'religion' =>$request->religion,
            'job' =>$request->job,
            'allergy_history' =>$request->aHistory,
            'disease_history' =>$request->dHistory,
            'disease_history_family' =>$request->dHistoryF


        ];

        Patient::create($data);
        // return redirect()->route('admin.patient.list');
        if ($request->religion == 'null'){
            return redirect()->route('admin.patient.listchild');
        }else {
            return redirect()->route('admin.patient.listadult');

        }
        
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
    public function editchild($id)
    {
        //
        
        $patient = Patient :: find($id);
                
        return view('pages.admin.patient.addPatient.child',compact('patient'));
    }

    public function editadult($id)
    {
        //
        
        $patient = Patient :: find($id);
                
        return view('pages.admin.patient.addPatient.adult',compact('patient'));
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

        if ($request->religion == 'null'){
            return redirect()->route('admin.patient.listchild');
        }else {
            return redirect()->route('admin.patient.listadult');

        }
        
        // if ($request->religion == 'null'){
        //     return redirect()->route('admin.patient.listPatient.child');
        // }else {
        //     return redirect()->route('admin.patient.listPatient.adult');

        // }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroychild($id)
    {
        //
        $patient = Patient::find($id);
        $patient->delete();
            return redirect()->route('admin.patient.listchild');
            
    }
    
    public function destroyadult($id)
    {
        //
        $patient = Patient::find($id);
        $patient->delete();
            
            return redirect()->route('admin.patient.listadult');
    }
}
