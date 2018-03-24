<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prescription;

class PrescriptionController extends Controller
{
    //
    public function index(){
        
        $prescriptions = Prescription::all();
        return view('pharmacist.prescription',compact('prescriptions'));
    }

    

    

}
