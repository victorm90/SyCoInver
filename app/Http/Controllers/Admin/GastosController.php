<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Gastos;
use App\Http\Requests\StoreGastosRequest;
use App\Http\Requests\UpdateGastosRequest;

class GastosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gastos = Gastos::all();
        return view('admin.gastos.index',compact('gastos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gastos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGastosRequest $request)
    {
        $gasto=Gastos::create($request->all());
        return redirect()->route('admin.gastos.index', $gasto)->with('info','Se creo con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gastos $gastos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gastos $gasto)
    {
        return view('admin.gastos.edit',compact('gasto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGastosRequest $request, Gastos $gasto)
    {
        $gasto->update($request->all());        
        return redirect()->route('admin.gastos.index', $gasto)->with('info','actualizacion con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gastos $gasto)
    {
        $gasto->delete();
        return redirect()->route('admin.gastos.index', $gasto)->with('info','actualizacion con exito');
    }
}
