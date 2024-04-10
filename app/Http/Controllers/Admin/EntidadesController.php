<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Entidades;
use App\Models\Provincia;
use Illuminate\Http\Request;
use LaravelLang\Publisher\Console\Update;

class EntidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entidades = Entidades::with('provincia')->get()->all();
        $provincias = Provincia::all(); 
        return view('admin.entidades.index', compact('entidades','provincias'));
    }
    public function create()
    {
        $provincias = Provincia::all();                          
        return view('admin.entidades.create',compact('provincias'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required | unique:entidades|max:100|min:10',
            'addres'=>'required|string|max:100|min:10',
            'creeup'=>'required|string|min:5|max:10|regex:/[0-9]{5}/',
            'telefono'=>'required|string|min:8|max:10|regex:/[0-9]{8}/',
            'email'=>'email|string|max:100',
            'provincia_id'=>'required'
        ]);
        $entidade=Entidades::create($request->all());        
        return redirect()->route('admin.entidades.index', $entidade)->with('info','Se creo con éxito');
    }
    public function show(Entidades $entidades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entidades $entidade)
    {
        $provincias = Provincia::pluck('name', 'id');                   
        return view('admin.entidades.edit',compact('entidade','provincias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entidades $entidade)
    {
        $request->validate([
            'name'=>'required |max:100|min:10',
            'addres'=>'required|string|max:100|min:10',
            'creeup'=>'required|string|min:5|max:10|regex:/[0-9]{5}/',
            'telefono'=>'required|string|min:8|max:10|regex:/[0-9]{8}/',
            'email'=>'email|string|max:100',
            'provincia_id'=>'required'
        ]);
        $entidade->update($request->all());        
        return redirect()->route('admin.entidades.index', $entidade)->with('info','Se actualizo con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entidades $entidade)
    {
        $entidade->delete();        
        return redirect()->route('admin.entidades.index')->with('info','Se a eliminado correctamente');
    }
}
