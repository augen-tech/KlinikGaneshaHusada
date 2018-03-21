<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\prescription;

class PrescriptionController extends Controller
{
    //
    public function index(){
        
        $prescriptions = prescription::all();
        
        return view('pharmacist.prescription',compact('prescriptions'));

    }

    

    

}
