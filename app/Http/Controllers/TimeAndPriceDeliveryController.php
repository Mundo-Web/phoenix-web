<?php

namespace App\Http\Controllers;

use App\Models\TimeAndPriceDelivery;
use App\Http\Requests\StoreTimeAndPriceDeliveryRequest;
use App\Http\Requests\UpdateTimeAndPriceDeliveryRequest;
use Illuminate\Http\Request;

class TimeAndPriceDeliveryController extends Controller
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
    public function store(StoreTimeAndPriceDeliveryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $politicDev = TimeAndPriceDelivery::first();
        // return view('public.popupPolyticsCondition', compact('politicDev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $terms = TimeAndPriceDelivery::first();
        if (!$terms) {
            $terms = TimeAndPriceDelivery::create(['content' => '']);
        }
        return view('pages.tiempoEnvio.edit', compact('terms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {   
       
        $request->validate([
            'content' => 'required',
        ]);
    
        $terms = TimeAndPriceDelivery::findOrfail($id); 
        $terms->update($request->all());
        $terms->save();

        return back()->with('success', 'Registro actualizado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimeAndPriceDelivery $timeAndPriceDelivery)
    {
        //
    }
}
