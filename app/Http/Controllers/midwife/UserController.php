<?php

namespace App\Http\Controllers\midwife;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function dashboard(){
        
        return view('pages.midwife.dashboard');
    }
}
