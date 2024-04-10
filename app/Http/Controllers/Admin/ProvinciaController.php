<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Provincia;
use App\Http\Requests\StoreProvinciaRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProvinciaRequest;

class ProvinciaController extends Controller
{
    public function index()
    {
        $provincias = Provincia::all();
        return view('admin.provincias.index',compact('provincias'));
    }
    public function create(){return view('admin.provincias.create');}

    public function store(Request $request)
    {
        $request->validate(['name'=>'required|max:35|min:5| unique:provincias|string']);
        $provincia=Provincia::create($request->all());
        return redirect()->route('admin.provincias.index', $provincia)->with('info','Se creo con éxito');
    }
    public function show(Provincia $provincia)
    {
        return view('admin.provincias.show',compact('provincia'));
    }
    public function edit(Provincia $provincia)
    {
        return view('admin.provincias.edit',compact('provincia'));
    }
    public function update(Request $request, Provincia $provincia)
    {
        $request->validate(['name'=>'required|unique:provincias|max:35|min:5|string']);
        $provincia->update($request->all());        
        return redirect()->route('admin.provincias.index', $provincia)->with('info','actualizacion con exito');
    }
    public function destroy(Provincia $provincia)
    {
        $provincia->delete();
        return redirect()->route('admin.provincias.index')->with('info','Se a eliminado correctamente');
    }
}
