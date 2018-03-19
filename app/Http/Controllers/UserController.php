<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index(){
        return view('login');
    }

    public function dashBoard(){
        return view('admin.dashBoard');
    }
}
