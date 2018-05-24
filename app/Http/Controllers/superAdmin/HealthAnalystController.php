<?php

namespace App\Http\Controllers\superAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Sentinel;

class HealthAnalystController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Sentinel::findRoleById(5);
        $healthAnalysts = $role->users()->with('roles')->get();
        return view('pages.superAdmin.healthAnalyst.list', compact('healthAnalysts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.superAdmin.healthAnalyst.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name'      => $request->name,
            'gender'    => $request->gender,
            'email'     => $request->email,
            'username'  => $request->username,
            'password'  => $request->password,
        ];

        $user = Sentinel::registerAndActivate($data);
        $role = Sentinel::findRoleBySlug('healthAnalyst');
        $user->roles()->attach($role);

        return redirect()->route('superAdmin.healthAnalyst.list');
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
    public function edit($id)
    {
        $healthAnalyst = User::find($id);
        return view('pages.superAdmin.healthAnalyst.form', compact('healthAnalyst'));
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
        $data = [
            'name'      => $request->name,
            'gender'    => $request->gender,
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        $user = Sentinel::findById($id);
        $user->update($data);
        
        return redirect()->route('superAdmin.healthAnalyst.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $healthAnalyst = User::find($id);
        $healthAnalyst->delete();
        return redirect()->route('superAdmin.healthAnalyst.list');
    }
}
