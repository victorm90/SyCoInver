<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Organismos;
use App\Http\Requests\StoreOrganismosRequest;
use App\Http\Requests\UpdateOrganismosRequest;

use function Laravel\Prompts\alert;

class OrganismosController extends Controller
{

    public function index()
    {
        $organismos = Organismos::all();
        return view('admin.organismos.index',compact('organismos'));
    }

    public function create()
    {
       return view('admin.organismos.create');
    }

    public function store(StoreOrganismosRequest $request)
    {
       $organismo= Organismos::create($request->all());
       return redirect()->route('admin.organismos.index', $organismo)->with('info','Se creo con éxito');
    }

    public function show(Organismos $organismos)
    {
        //
    }

    public function edit(Organismos $organismo)
    {
       return view('admin.organismos.edit',compact('organismo'));
    }

    public function update(UpdateOrganismosRequest $request, Organismos $organismo)
    {
        $organismo->update($request->all());
        return  redirect()->route('admin.organismos.index', $organismo)->with('info','actualizacion con exito');
    }
    
    public function destroy(Organismos $organismo)
    {
        $organismo->delete();
        return redirect()->route('admin.organismos.index')->with('info','Se a eliminado correctamente');
    }
}
