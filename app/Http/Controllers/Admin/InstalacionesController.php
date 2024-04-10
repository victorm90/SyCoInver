<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Instalaciones;
use App\Http\Requests\StoreInstalacionesRequest;
use App\Http\Requests\UpdateInstalacionesRequest;
use App\Models\Cadena;
use App\Models\Municipios;

class InstalacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instalaciones = Instalaciones::with(['municipio', 'cadena'])->get();
        $cadenas = Cadena::all();
        $municipios = Municipios::all();      
        return view("admin.instalaciones.index", compact('instalaciones','cadenas','municipios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.instalaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstalacionesRequest $request)
    {
        $instalaciones=Instalaciones::create($request->all());
        return redirect()->route('admin.instalaciones.index', $instalaciones)->with('info', 'Se creo con éxito');
    }

    /** 
     * Display the specified resource.
     */
    public function show(Instalaciones $instalacion)
    {   


        return view('admin.instalaciones.show', compact('instalacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instalaciones $instalacione)
    {
        $cadenas = Cadena::pluck('name', 'id');
        $municipios = Municipios::pluck('name', 'id');
        return view('admin.instalaciones.edit',compact('instalacione','cadenas','municipios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstalacionesRequest $request, Instalaciones $instalacione)
    {
        $instalacione->update($request->all());      
        return redirect()->route('admin.instalaciones.index', $instalacione)->with('info','actualizacion con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instalaciones $instalacione)
    {        
        $instalacione->delete();              
        return redirect()->route('admin.instalaciones.index')->with('info','se elimino con exito');
    }
}
