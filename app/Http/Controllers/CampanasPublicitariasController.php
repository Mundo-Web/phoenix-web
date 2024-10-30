<?php

namespace App\Http\Controllers;

use App\Models\CampanasPublicitarias;
use App\Http\Requests\StoreCampanasPublicitariasRequest;
use App\Http\Requests\UpdateCampanasPublicitariasRequest;
use Illuminate\Http\Request;

class CampanasPublicitariasController extends Controller
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
    public function store(StoreCampanasPublicitariasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $politicDev = CampanasPublicitarias::first();
        // return view('public.popupPolyticsCondition', compact('politicDev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $terms = CampanasPublicitarias::first();
        if (!$terms) {
            $terms = CampanasPublicitarias::create(['content' => '']);
        }
        return view('pages.campanasPublicitarias.edit', compact('terms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {   
       
        $request->validate([
            'content' => 'required',
        ]);
    
        $terms = CampanasPublicitarias::findOrfail($id); 
        $terms->update($request->all());
        $terms->save();

        return back()->with('success', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CampanasPublicitarias $campanasPublicitarias)
    {
        //
    }
}
