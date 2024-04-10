<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlanRequest;
use App\Models\Entidades;
use App\Models\Instalacion;
use App\Models\Obra;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
     public function index()
    {
        $planes = Plan::all();        
        return view("admin.planes.index", compact("planes"));
    }
   
    /* public function general()
    {
        $planes = Plan::all();        
        return view("admin.planes.general", compact("planes"));
    } */

    public function create()
    {
        $entidades = Entidades::pluck('name', 'id');
        $instalacion = Instalacion::pluck('name', 'id');
        $obra = Obra::pluck('name', 'id');
        return view('admin.planes.create',compact('entidades','instalacion','obra'));
    }

    public function store(StorePlanRequest $request)
    {            
        $plan = Plan::create($request->all());             
        return redirect()->route('admin.planes.index', $plan)->with('info', 'Se creo con éxito');
    }

    public function show(Plan $plane)
    {
       return view('admin.planes.show', compact("plane"));
    }

    public function edit(Plan $plan)
    {
        return view("admin.planes.edit", compact("plan"));
    }

    public function update(Request $request, Plan $plan)
    {
        //
    }

    public function destroy(Plan $plane)
    {
        $plane->delete();        
        return redirect()->route('admin.planes.index')->with('info','Se a eliminado correctamente');
    }
}
