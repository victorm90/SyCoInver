<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tipobras;
use App\Http\Requests\StoreTipobrasRequest;
use App\Http\Requests\UpdateTipobrasRequest;

class TipobrasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipobra = Tipobras::all();
        return view('admin.tipobras.index', compact('tipobra'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipobrasRequest $request)
    {
        $request->validate([
            'name' => 'required|max:50|min:5| unique:tipobras|string',
            'detalle' => 'max:150|min:5|string'
        ]);
        $tipobra = Tipobras::create($request->all());
        return redirect()->route('admin.tipobras.index', $tipobra)->with('info', 'Se creo con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipobras $tipobras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipobras $tipobra)
    {
        
    }

    public function update(UpdateTipobrasRequest $request, Tipobras $tipobra)
    {
        $tipobra->update($request->all());
        return redirect()->route('admin.tipobras.index')->with('info', 'Actualización exitosa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipobras $tipobra)
    {
        $tipobra->delete();
        return redirect()->route('admin.tipobras.index')->with('info', 'Se a eliminado correctamente');
    }
}
