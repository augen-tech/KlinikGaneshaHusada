<?php

namespace App\Http\Controllers\doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function dashboard(){
        
        return view('pages.doctor.dashboard');
    }
}
