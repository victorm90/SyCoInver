<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreObraRequest;
use App\Models\CodigoInversiones;
use App\Models\Desagregaciones;
use App\Models\Ejecutors;
use App\Models\Empresas;
use App\Models\Importadores;
use App\Models\Instalaciones;
use App\Models\Obra;
use App\Models\Organismos;
use App\Models\Tipobras;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obras = Obra::with(['organismo','empresa','importadore','instalacion','tipobra','codigoinversiones'])->get();
        dd($obras);
        $organismo = Organismos::all();        
        $empresa= Empresas::all();
        $importadore = Importadores::all();
        $instalacion = Instalaciones::all();        
        $tipobra= Tipobras::all();
        $codigoinversiones= CodigoInversiones::all();
        $ejecutor = Ejecutors::where('estado',1)->get();

        return view("admin.obras.index", compact('obras','organismo','empresa','importadore','ejecutor','instalacion','tipobra','codigoinversiones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.obras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreObraRequest $request)
    {        
        /* dd($request); */
        if ($request->validated()) {
            try {
                DB::beginTransaction();                
                $nuevo_modelo = new Obra();
                $nuevo_modelo->name = $request->get('name');
                $nuevo_modelo->instalacione_id = $request->get('instalacione_id');
                $nuevo_modelo->tipobra_id = $request->get('tipobra_id');
                $nuevo_modelo->importadore_id = $request->get('importadore_id');
                $nuevo_modelo->organismo_id = $request->get('organismo_id');
                $nuevo_modelo->valorplan = $request->get('valorplan');                
                $nuevo_modelo->valorhidden = $request->get('valorhidden');                
                /* $nuevo_modelo->user_id = auth()->id(); */
                $nuevo_modelo->save();
                $arrayidejecutore = $request->get('arrayidejecutore');
                $arrayfecha = $request->get('arrayfecha');
                $arraycostoMN = $request->get('arraycostoMN');
                $arraycostoUSD = $request->get('arraycostoUSD');
                $siseArray = count($arrayidejecutore);
                $cont = 0;
                while ($cont < $siseArray) {
                    $nuevo_modelo->ejecutor()->syncWithoutDetaching([
                        $arrayidejecutore[$cont] => [
                            'fecha' => $arrayfecha[$cont],
                            'costomcu' => $arraycostoMN[$cont],
                            'costousd' => $arraycostoUSD[$cont],
                        ]
                    ]);
                    $cont++;
                }
                DB::commit();
            } catch (Exception $e) {
                dd($e);
                DB::rollBack();
            }
            return redirect()->route('admin.obras.index')->with('info', 'Se creo con éxito');
        } else {
            dd('error papa');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Obra $obra)
    {
        return view('admin.obras.show', compact('obra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obra $obra)
    {
        return view('admin.obras.edit',compact('obra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obra $obra)
    {
        $request->validate(['name'=>'required|max:255|min:10| unique:obras|string']);
        $obra->update($request->all());
        return redirect()->route('admin.obras.index', $obra)->with('info','Se creo con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obra $obra)
    {
       $obra->delete();
       return redirect()->route('admin.obras.index')->with('info','Se a eliminado correctamente');
    }
}
