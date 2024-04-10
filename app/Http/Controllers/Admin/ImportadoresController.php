<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Importadores;
use App\Http\Requests\StoreImportadoresRequest;
use App\Http\Requests\UpdateImportadoresRequest;

class ImportadoresController extends Controller
{
    public function index()
    {
        $importadores = Importadores::all();
        return view('admin.importadores.index',compact('importadores'));

    }

    public function create()
    {
        return view('admin.importadores.create');
    }

    public function store(StoreImportadoresRequest $request)
    {
        $importadores = Importadores::create($request->all());
        return redirect()->route('admin.importadores.index', $importadores)->with('info','Se creo con éxito');
    }

    public function show(Importadores $importadores)
    {
        
    }
    
    public function edit(Importadores $importadores)
    {
        return view('admin.importadores.edit');
    }
    
    public function update(UpdateImportadoresRequest $request, Importadores $importadore)
    {
        $importadore->update($request->all());
        return redirect()->route('admin.importadres.index')->with('info','Se actualizo con éxito');
    }
    
    public function destroy(Importadores $importadore)
    {
        $importadore->delete();
        return redirect()->route('admin.importadores.index')->with('info','Se elimino con éxito');
    }
}
