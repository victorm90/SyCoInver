<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Empresas;
use App\Http\Requests\StoreEmpresasRequest;
use App\Http\Requests\UpdateEmpresasRequest;
use GuzzleHttp\RetryMiddleware;

class EmpresasController extends Controller
{
    public function index()
    {
        $empresas = Empresas::all();
        return view('admin.empresas.index',compact('empresas'));
    }

    public function create()
    {
        return view('admin.empresas.create');
    }

    public function store(StoreEmpresasRequest $request)
    {
        $empresa=Empresas::create($request->all());
        return redirect()->route('admin.empresas.index', $empresa )->with('info','Se creo con éxito');
    }

    public function show(Empresas $empresas)
    {
        //
    }

    public function edit(Empresas $empresa)
    {
        return view('admin.empresas.edit',compact('empresa'));
    }

    public function update(UpdateEmpresasRequest $request, Empresas $empresa)
    {
        $empresa->update($request->all());
        return redirect()->route('admin.empresas.index', $empresa)->with('info','Se actualizo con éxito');
    }

    public function destroy(Empresas $empresa)
    {
        $empresa->delete();
        return redirect()->route('admin.empresas.index')->with('info','Se elimino con éxito');
    }
}
