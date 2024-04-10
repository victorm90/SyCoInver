<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Municipios;
use App\Http\Requests\StoreMunicipiosRequest;
use App\Http\Requests\UpdateMunicipiosRequest;

class MunicipiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municipios = Municipios::all();
        return view('admin.municipios.index',compact('municipios'));
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
    public function store(StoreMunicipiosRequest $request)
    {
        $request->validate([
            'name'=>'required|max:50|min:5| unique:municipios|string',
            'detalle'=>'max:150|min:5|string'
        ]);
        $municipio = Municipios::create($request->all());
        return redirect()->route('admin.municipios.index', $municipio)->with('info','Se creo con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Municipios $municipios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Municipios $municipio)
    {
        return view('admin.municipios.edit',compact('municipio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMunicipiosRequest $request, Municipios $municipio)
    {
        $request->validate([
            'name'=>'required|max:35|min:5|string',
            'detalle'=>'max:150|min:5|string'
        ]);
        $municipio->update($request->all());        
        return redirect()->route('admin.municipios.index', $municipio)->with('info','actualizacion con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Municipios $municipio)
    {
        $municipio->delete();
        return redirect()->route('admin.municipios.index')->with('info','Se a eliminado correctamente');
    }
}
