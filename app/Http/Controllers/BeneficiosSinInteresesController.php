<?php

namespace App\Http\Controllers;

use App\Models\BeneficiosSinIntereses;
use App\Http\Requests\StoreBeneficiosSinInteresesRequest;
use App\Http\Requests\UpdateBeneficiosSinInteresesRequest;
use Illuminate\Http\Request;

class BeneficiosSinInteresesController extends Controller
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
    public function store(StoreBeneficiosSinInteresesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $politicDev = BeneficiosSinIntereses::first();
        // return view('public.popupPolyticsCondition', compact('politicDev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $terms = BeneficiosSinIntereses::first();
        if (!$terms) {
            $terms = BeneficiosSinIntereses::create(['content' => '']);
        }
        return view('pages.beneficiosSinIntereses.edit', compact('terms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {   
       
        $request->validate([
            'content' => 'required',
        ]);
    
        $terms = BeneficiosSinIntereses::findOrfail($id); 
        $terms->update($request->all());
        $terms->save();

        return back()->with('success', 'Registro actualizado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BeneficiosSinIntereses $beneficiosSinIntereses)
    {
        //
    }
}
