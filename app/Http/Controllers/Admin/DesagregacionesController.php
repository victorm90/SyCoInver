<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Desagregaciones;
use App\Http\Requests\StoreDesagregacionesRequest;
use App\Http\Requests\UpdateDesagregacionesRequest;
use App\Models\Instalaciones;

class DesagregacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desagregaciones = Desagregaciones::with('instalacione')->get()->all();
        $instalaciones = Instalaciones::all();        
        return view("admin.desagregaciones.index", compact('desagregaciones','instalaciones'));
    }    
    public function create()
    {
        $instalaciones = Instalaciones::pluck('name', 'id');
    }
    public function store(StoreDesagregacionesRequest $request)
    {
        dd($request);
    }
    public function show(Desagregaciones $desagregaciones)
    {
        //
    }
    public function edit(Desagregaciones $desagregacione)
    {
        $desagregacione = Instalaciones::pluck('name', 'id');        
        return view('admin.instalaciones.edit', compact('desagregacione'));
    }
    public function update(UpdateDesagregacionesRequest $request, Desagregaciones $desagregaciones)
    {
        //
    }
    public function destroy(Desagregaciones $desagregaciones)
    {
        $desagregaciones->delete();
    }
}
