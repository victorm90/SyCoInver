<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Combustible;

class CombustibleController extends Controller
{


    public function __construct()
    {
      $this->middleware('can:admin.combustibles.index')->only('index');
      $this->middleware('can:admin.combustibles.create')->only('create','store');
      $this->middleware('can:admin.combustibles.edit')->only('edit','update'); 
      $this->middleware('can:admin.combustibles.destroy')->only('destroy');       
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $combustibles = Combustible::all();
        return view('admin.combustibles.index',compact('combustibles')); */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.combustibles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            /* 'name'=>'required | unique:combustibles' */
            'name'=>'required|max:12|min:5| unique:combustibles|string'
        ]);
        $combustible=Combustible::create($request->all());
        return redirect()->route('admin.combustibles.index', $combustible)->with('info','Se creo con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Combustible $combustible)
    {
        return view('admin.combustibles.show',compact('combustible'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Combustible $combustible)
    {
        return view('admin.combustibles.edit',compact('combustible'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Combustible $combustible)
    {
        $request->validate([            
            'name'=>'required|unique:combustibles|max:12|min:5|string '
        ]);
        $combustible->update($request->all());        
        return redirect()->route('admin.combustibles.index', $combustible)->with('info','actualizacion con exito');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Combustible $combustible)
    {
        $combustible->delete();
        return redirect()->route('admin.combustibles.index')->with('info','Se a eliminado correctamente');
    }
}
