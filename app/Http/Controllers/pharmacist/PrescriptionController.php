<?php

namespace App\Http\Controllers\pharmacist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Prescription;

class PrescriptionController extends Controller
{
    //
    public function index(){
        
        $prescriptions = Prescription::all();
        return view('pharmacist.prescription.list',compact('prescriptions'));
    }

    

    

}
