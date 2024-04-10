<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Instalacion;
use Illuminate\Http\Request;


class InstalacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instalacione = Instalacion::with(['user','obra','entidade','ejecutor'])->get();              
        return view("admin.instalaciones.index", compact("instalacione"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.instalaciones.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([            
            'name'=>'required|max:50|min:5| string |unique:instalacions',
            'descriptions'=>'string'
        ]);
        $instalacion=Instalacion::create($request->all());
        return redirect()->route('admin.instalaciones.index', $instalacion)->with('info','Se creo con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instalacion $instalacion)
    {
        return view('admin.instalaciones.show', compact('instalacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instalacion $instalacione)
    {
        return view('admin.instalaciones.edit', compact('instalacione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instalacion $instalacione)
    {
        $request->validate([            
            'name'=>'required|max:30|min:5|string '
        ]);
        $instalacione->update($request->all());        
        return redirect()->route('admin.instalaciones.index', $instalacione)->with('info','actualizacion con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instalacion $instalacione)
    {
        $instalacione->delete();        
        return redirect()->route('admin.instalaciones.index')->with('info','elimino con exito');
    }
}
