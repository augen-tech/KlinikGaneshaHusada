<?php

namespace App\Http\Controllers\healthAnalyst;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function dashboard()
    {
        return view('pages.healthAnalyst.dashboard');
    }
}
