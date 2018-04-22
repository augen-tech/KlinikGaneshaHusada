<?php

namespace App\Http\Controllers\pharmacist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function dashboard(){
        
        return view('pages.pharmacist.dashboard');
    }
}
