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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactoViewRequest $request, ContactoView $contactoView)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactoView $contactoView)
    {
        //
    }
}
