<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Combustible;
use Illuminate\Http\Request;
use App\Models\Tarjeta;
use Illuminate\Support\Facades\Facade\DB;



class TarjetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarjetas = Tarjeta::with('combustible')->get()->all();
        /* dd($tarjetas); */
     return view('admin.tarjetas.index', compact('tarjetas'));
     /* return $tarjetas->combustible->text->name; */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $combustibles = Combustible::pluck('name', 'id');                           
        return view('admin.tarjetas.create',compact('combustibles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'num_tarj'=>'required | unique:tarjetas',
            'combustible_id'=>'required'
        ]);
    /*     dd($request->all()); */
        $tarjeta = new Tarjeta;    
        $tarjeta->num_tarj = $request->num_tarj;
        $tarjeta->combustible_id = $request->combustible_id;
        $tarjeta->save();
        return redirect()->route('admin.tarjetas.index', $tarjeta)->with('info','Se creo con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarjeta $tarjeta)
    {
        return view('admin.tarjetas.show',compact('tarjeta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarjeta $tarjeta)
    {
        $combustibles = Combustible::pluck('name', 'id');  
        return view('admin.tarjetas.edit',compact('tarjeta','combustibles'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarjeta $tarjeta)
    {
        $request->validate([
            'num_tarj'=>'required' ,
            'combustible_id'=>'required '
        ]);    
        $tarjeta->num_tarj = $request->num_tarj;
        $tarjeta->combustible_id = $request->combustible_id;
        /* dd($tarjeta_edit); */
        $tarjeta->save();
        /* $tarjeta->update($request->all());  */           
        return redirect()->route('admin.tarjetas.index', $tarjeta)->with('info','actualizacion con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarjeta $tarjeta)
    {
        $tarjeta->delete();
        return redirect()->route('admin.tarjetas.index')->with('info','Se a eliminado correctamente');
    }
}
