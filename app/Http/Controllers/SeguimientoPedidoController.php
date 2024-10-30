<?php

namespace App\Http\Controllers;

use App\Models\SeguimientoPedido;
use App\Http\Requests\StoreSeguimientoPedidoRequest;
use App\Http\Requests\UpdateSeguimientoPedidoRequest;
use Illuminate\Http\Request;

class SeguimientoPedidoController extends Controller
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
    public function store(StoreSeguimientoPedidoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $politicDev = SeguimientoPedido::first();
        // return view('public.popupPolyticsCondition', compact('politicDev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $terms = SeguimientoPedido::first();
        if (!$terms) {
            $terms = SeguimientoPedido::create(['content' => '']);
        }
        return view('pages.seguimientoPedido.edit', compact('terms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {   
       
        $request->validate([
            'content' => 'required',
        ]);
    
        $terms = SeguimientoPedido::findOrfail($id); 
        $terms->update($request->all());
        $terms->save();

        return back()->with('success', 'Registro actualizado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeguimientoPedido $seguimientoPedido)
    {
        //
    }
}
