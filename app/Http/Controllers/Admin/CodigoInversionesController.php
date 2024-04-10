<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\CodigoInversiones;
use App\Http\Requests\StoreCodigoInversionesRequest;
use App\Http\Requests\UpdateCodigoInversionesRequest;

class CodigoInversionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $codigos = CodigoInversiones::all();        
        return view('admin.codigos.index',compact('codigos'));
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
    public function store(StoreCodigoInversionesRequest $request)
    {
        $request->validate([
            'name'=>'required|max:50|min:5| unique:codigo_inversiones|string',
            'detalle'=>'max:150|min:5|string'
        ]);
        $codigo = CodigoInversiones::create($request->all());
        return redirect()->route('admin.codigo.index', $codigo)->with('info','Se creo con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(CodigoInversiones $codigoInversiones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CodigoInversiones $codigoInversiones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCodigoInversionesRequest $request, CodigoInversiones $codigo)
    {
        $request->validate([
            'name'=>'required|max:35|min:5|string',
            'detalle'=>'max:150|min:5|string'
        ]);
        $codigo->update($request->all());        
        return redirect()->route('admin.codigo.index', $codigo)->with('info','actualizacion con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CodigoInversiones $codigo)
    {
        $codigo->delete();
        return redirect()->route('admin.codigo.index')->with('info','Se a eliminado correctamente');
    }
}
