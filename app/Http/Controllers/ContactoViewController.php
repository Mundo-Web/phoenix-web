<?php

namespace App\Http\Controllers;

use App\Models\ContactoView;
use App\Http\Requests\StoreContactoViewRequest;
use App\Http\Requests\UpdateContactoViewRequest;

class ContactoViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactoViewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactoView $contactoView)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactoView $contactoView)
    {
        $contacto = ContactoView::first();
        if (!$contacto) {
            $contacto = ContactoView::create();
        }
        return view('pages.contactoview.edit', compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $contacto = ContactoView::findOrfail($id);

        if ($request->hasFile("imagensecond")) {
            $file = $request->file('imagensecond');
            $routeImg = 'storage/images/contactoview/';
            $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();
      
            $this->saveImg($file, $routeImg, $nombreImagen);
      
            $contacto['url_image2section'] = $routeImg . $nombreImagen;
        } 

        $contacto->update($request->all());
        $contacto->save();  

        return back()->with('success', 'Registro actualizado correctamente');
    }


    public function saveImg($file, $route, $nombreImagen)
    {
      $manager = new ImageManager(new Driver());
      $img =  $manager->read($file);
      if (!file_exists($route)) {
        mkdir($route, 0777, true);
      }
      $img->save($route . $nombreImagen);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactoView $contactoView)
    {
        //
    }
}
