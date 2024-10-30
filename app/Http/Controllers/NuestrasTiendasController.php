<?php

namespace App\Http\Controllers;

use App\Models\NuestrasTiendas;
use App\Http\Requests\StoreNuestrasTiendasRequest;
use App\Http\Requests\UpdateNuestrasTiendasRequest;
use Illuminate\Http\Request;

class NuestrasTiendasController extends Controller
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
    public function store(StoreNuestrasTiendasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $politicDev = NuestrasTiendas::first();
        // return view('public.popupPolyticsCondition', compact('politicDev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $terms = NuestrasTiendas::first();
        if (!$terms) {
            $terms = NuestrasTiendas::create(['content' => '']);
        }
        return view('pages.nuestrasTiendas.edit', compact('terms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {   
       
        $request->validate([
            'content' => 'required',
        ]);
    
        $terms = NuestrasTiendas::findOrfail($id); 
        $terms->update($request->all());
        $terms->save();

        return back()->with('success', 'Registro actualizado correctamente');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NuestrasTiendas $nuestrasTiendas)
    {
        //
    }
}
