<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Cadena;
use App\Http\Requests\StoreCadenaRequest;
use App\Http\Requests\UpdateCadenaRequest;

class CadenaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cadenas = Cadena::all();
        return view('admin.cadenas.index',compact('cadenas'));
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
    public function store(StoreCadenaRequest $request)
    {
        $request->validate([
            'name'=>'required|max:50|min:5| unique:cadenas|string',
            'detalle'=>'max:150|min:5|string'
        ]);
        $cadena = Cadena::create($request->all());
        return redirect()->route('admin.cadenas.index', $cadena)->with('info','Se creo con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cadena $cadena)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cadena $cadena)
    {
        return view('admin.cadenas.edit',compact('cadena'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCadenaRequest $request, Cadena $cadena)
    {
        $request->validate([
            'name'=>'required|max:35|min:5|string',
            'detalle'=>'max:150|min:5|string'
        ]);
        $cadena->update($request->all());        
        return redirect()->route('admin.cadenas.index', $cadena)->with('info','actualizacion con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cadena $cadena)
    {
        $cadena->delete();
        return redirect()->route('admin.cadenas.index')->with('info','Se a eliminado correctamente');
    }
}
