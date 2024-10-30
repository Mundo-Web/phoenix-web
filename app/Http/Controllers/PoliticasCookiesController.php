<?php

namespace App\Http\Controllers;

use App\Models\PoliticasCookies;
use App\Http\Requests\StorePoliticasCookiesRequest;
use App\Http\Requests\UpdatePoliticasCookiesRequest;
use Illuminate\Http\Request;

class PoliticasCookiesController extends Controller
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
    public function store(StorePoliticasCookiesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $politicDev = PoliticasCookies::first();
        // return view('public.popupPolyticsCondition', compact('politicDev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $terms = PoliticasCookies::first();
        if (!$terms) {
            $terms = PoliticasCookies::create(['content' => '']);
        }
        return view('pages.politicasCookies.edit', compact('terms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {   
       
        $request->validate([
            'content' => 'required',
        ]);
    
        $terms = PoliticasCookies::findOrfail($id); 
        $terms->update($request->all());
        $terms->save();

        return back()->with('success', 'Registro actualizado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PoliticasCookies $politicasCookies)
    {
        //
    }
}
