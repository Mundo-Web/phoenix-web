<?php

namespace App\Http\Controllers;

use App\Models\Shortcode;
use App\Http\Requests\StoreShortcodeRequest;
use App\Http\Requests\UpdateShortcodeRequest;
use Illuminate\Http\Request;

class ShortcodeController extends Controller
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
    public function store(StoreShortcodeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $shortcode = Shortcode::find(1);
        return view('components.shortcode.contain_body', compact('shortcode'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shortcode $shortcode)
    {
        $shortcode = Shortcode::first();
        if (!$shortcode) {
            $shortcode = Shortcode::create(['head' => '']);
        }

        return view('pages.shortcode.edit', compact('shortcode'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       
        $validatedData = $request->validate([
            'head' => 'required',  // Ejemplo de campo requerido
             // Ejemplo de campo opcional
            // Agrega las reglas de validación para tus campos aquí
        ]);

        $shortcode = Shortcode::findOrfail($id); 

        // Actualizar los campos del registro con los datos del formulario
         $shortcode->update($request->all());

        // Guardar 
        $shortcode->save();  

        return back()->with('success', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shortcode $shortcode)
    {
        //
    }
}
