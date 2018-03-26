<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicine;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medicines = medicine::all();
        return view('pharmacist.medicinelist',compact('medicines'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pharmacist.addmedicine');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = [
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
        ];

        $medic = medicine::create($data);
        
        return view('pharmacist.addmedicine');
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
        //
        $medicine = Medicine::find($id);
        return view('pharmacist.editmedicinelist', compact('medicine'));

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
        // 'stock' => $request->stock,
        $medicine = Medicine::find($id);
        
        $data = [
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
        ];

        $medicine->update($data);
        
        return redirect()->route('pharmacist.medicinelist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $medicine = Medicine::find($id)->delete();
        
        return redirect()->route('pharmacist.medicinelist');

    }
}
