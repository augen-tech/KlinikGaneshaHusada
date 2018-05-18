<?php

namespace App\Http\Controllers\superAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Sentinel;

class MidwifeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Sentinel::findRoleById(4);
        $midwifes = $role->users()->with('roles')->get();
        return view('pages.superAdmin.midwife.list', compact('midwifes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.superAdmin.midwife.form');
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
        $role = Sentinel::findRoleBySlug('midwife');
        $user->roles()->attach($role);

        return redirect()->route('superAdmin.midwife.list');
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
        $midwife = User::find($id);
        return view('pages.superAdmin.midwife.form', compact('midwife'));
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

        return redirect()->route('superAdmin.midwife.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $midwife = User::find($id);
        $midwife->delete();
        return redirect()->route('superAdmin.midwife.list');
    }
}
