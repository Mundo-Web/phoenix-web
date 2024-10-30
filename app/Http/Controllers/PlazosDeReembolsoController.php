<?php

namespace App\Http\Controllers;

use App\Models\PlazosDeReembolso;
use App\Http\Requests\StorePlazosDeReembolsoRequest;
use App\Http\Requests\UpdatePlazosDeReembolsoRequest;
use Illuminate\Http\Request;

class PlazosDeReembolsoController extends Controller
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
    public function store(StorePlazosDeReembolsoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $politicDev = PlazosDeReembolso::first();
        // return view('public.plazoReembolso', compact('politicDev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $terms = PlazosDeReembolso::first();
        if (!$terms) {
            $terms = PlazosDeReembolso::create(['content' => '']);
        }
        return view('pages.plazoReembolso.edit', compact('terms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {   
       
        $request->validate([
            'content' => 'required',
        ]);
    
        $terms = PlazosDeReembolso::findOrfail($id); 
        $terms->update($request->all());
        $terms->save();

        return back()->with('success', 'Registro actualizado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlazosDeReembolso $plazosDeReembolso)
    {
        //
    }
}
