<?php

namespace App\Http\Controllers;

use App\Models\TratamientoAdicionalDatos;
use App\Http\Requests\StoreTratamientoAdicionalDatosRequest;
use App\Http\Requests\UpdateTratamientoAdicionalDatosRequest;
use Illuminate\Http\Request;

class TratamientoAdicionalDatosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTratamientoAdicionalDatosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $politicDev = TratamientoAdicionalDatos::first();
        // return view('public.popupPolyticsCondition', compact('politicDev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $terms = TratamientoAdicionalDatos::first();
        if (!$terms) {
            $terms = TratamientoAdicionalDatos::create(['content' => '']);
        }
        return view('pages.tratamientoAdicional.edit', compact('terms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {   
       
        $request->validate([
            'content' => 'required',
        ]);
    
        $terms = TratamientoAdicionalDatos::findOrfail($id); 
        $terms->update($request->all());
        $terms->save();

        return back()->with('success', 'Registro actualizado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TratamientoAdicionalDatos $tratamientoAdicionalDatos)
    {
        //
    }
}
