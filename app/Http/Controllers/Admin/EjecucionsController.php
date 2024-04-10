<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Ejecucions;
use App\Http\Requests\StoreEjecucionsRequest;
use App\Http\Requests\UpdateEjecucionsRequest;
use App\Models\Ejecutors;
use App\Models\Servicios;

class EjecucionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ejecucions = Ejecucions::with(['instalacion','obra','servicio','entidad','ejecutor'])->get();
       
        return view("admin.ejecucions.index", compact("ejecucions"));
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
    public function store(StoreEjecucionsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ejecucions $ejecucions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ejecucions $ejecucions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEjecucionsRequest $request, Ejecucions $ejecucions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ejecucions $ejecucions)
    {
        //
    }
}
