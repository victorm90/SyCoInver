<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Tipos;
use App\Http\Requests\StoreTiposRequest;
use App\Http\Requests\UpdateTiposRequest;

class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Tipos::all();
        return view('admin.tipos.index',compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){return view('admin.tipos.create');}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTiposRequest $request)
    {
        $request->validate([
            'name'=>'required|max:35|min:2| unique:tipos|string',
            
        ]);
        $tipos=Tipos::create($request->all());
        return redirect()->route('admin.tipos.index', $tipos)->with('info','Se creo con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipos $tipo)
    {
        return view('admin.tipos.show',compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipos $tipo)
    {
        return view('admin.tipos.edit',compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTiposRequest $request, Tipos $tipo)
    {
        $request->validate([
            'name'=>'required|max:40|min:3|string',
            
        ]);
        $tipo->update($request->all());        
        return redirect()->route('admin.tipos.index', $tipo)->with('info','actualizacion con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipos $tipo)
    {
        $tipo->delete();
        return redirect()->route('admin.tipos.index')->with('info','Se a eliminado correctamente');
    }
}
