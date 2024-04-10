<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Servicios;
use App\Http\Requests\StoreServiciosRequest;
use App\Http\Requests\UpdateServiciosRequest;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicios::all();
        return view('admin.servicios.index',compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiciosRequest $request)
    {
        $servicio=Servicios::create($request->all());
        return redirect()->route('admin.servicios.index', $servicio)->with('info','Se creo con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicios $servicios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicios $servicio)
    {
        return view('admin.servicios.edit',compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiciosRequest $request, Servicios $servicio)
    {
        $servicio->update($request->all());        
        return redirect()->route('admin.servicios.index', $servicio)->with('info','actualizacion con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicios $servicio)
    {
        $servicio->delete();
        return redirect()->route('admin.servicios.index')->with('info','actualizacion con exito');
    }
}
