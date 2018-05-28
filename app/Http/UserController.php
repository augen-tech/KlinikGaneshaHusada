<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Exceptions\User\WrongCredentialException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Sentinel;

class UserController extends Controller
{
    //
    public function index(){
        return redirect()->route('login');
    }

    public function login(){
        return view('login');
    }

    public function postLogin(Request $request){
        try{
            Sentinel::authenticate($request->all());
            if(Sentinel::check())
                if(Sentinel::getUser()->roles()->first()->slug == 'superAdmin')
                    return redirect()->route('superAdmin.dashboard');
                elseif(Sentinel::getUser()->roles()->first()->slug == 'admin')
                    return redirect()->route('admin.dashboard');
                elseif(Sentinel::getUser()->roles()->first()->slug == 'doctor')
                    return redirect()->route('doctor.dashboard');
                elseif(Sentinel::getUser()->roles()->first()->slug == 'midwife')
                    return redirect()->route('midwife.dashboard');
                elseif(Sentinel::getUser()->roles()->first()->slug == 'healthAnalyst')
                    return redirect()->route('healthAnalyst.dashboard');
                else
                    return redirect()->route('pharmacist.dashboard');
            else
                throw new WrongCredentialException("Username atau Password salah");
        } catch (WrongCredentialException $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            return redirect()->back()->with(['error' => "You are banned for $delay seconds."]);
        }
    }

    public function postLogout()
    {
        Sentinel::logout();
        return redirect()->route('login');
    }
}
