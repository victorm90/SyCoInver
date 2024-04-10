<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Instalaciones;
use App\Models\Obra;
use App\Models\Ejecuciones;
use App\Models\Ejecutors;
use App\Models\Entidades;
use App\Models\Gastos;
use App\Models\Servicios;
use App\Http\Requests\StoreEjecucionesRequest;
use App\Http\Requests\UpdateEjecucionesRequest;
use Exception;
use Illuminate\Support\Facades\DB;

class EjecucionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ejecuciones = Ejecuciones::with(['entidade','instalacione','ejecutor','obra','gasto','servicio'])->get();        
        $entidade = Entidades::all();
        $instalacione = Instalaciones::all();
        $obras = Obra::all();
        $ejecutor = Ejecutors::where('estado',1)->get();
        $gastos = Gastos::all();        
        $servicios= Servicios::all();       

        return view("admin.ejecuciones.index", compact('ejecuciones','entidade','instalacione','ejecutor','obras','gastos','servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {                   
        return view('admin.ejecuciones.create',compact('entidades','instalacione','ejecutors','obras','gastos','servicios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEjecucionesRequest $request)
    {
        /* dd($request->validated());
        $instalaciones = Instalaciones::create($request->all());
        $instalaciones->servicio()->sync($request->input('servicio_id', []));
         */
       
        try {
            DB::beginTransaction();

            $ejecuciones = Ejecuciones::create($request->validated());

            $arrayidservicio = $request->get('arrayidservicio');
            $arrayfecha = $request->get('arrayfecha');
            $arraynfactura = $request->get('arraynfactura');
            $arraycostoMN = $request->get('arraycostoMN');
            $arraycostoUSD = $request->get('arraycostoUSD');

            $siseArray = count($arrayidservicio);
            $cont = 0;
            while ($cont < $siseArray) {
                $ejecuciones->servicio()->syncWithoutDetaching([
                    $arrayidservicio[$cont] => [
                        'fecha' => $arrayfecha[$cont],
                        'nfactura' => $arraynfactura[$cont],
                        'costomcu' => $arraycostoMN[$cont],
                        'costousd' => $arraycostoUSD[$cont],
                    ]
                ]);
                $cont++;
            }
            DB::commit();
        } catch (Exception $e) {
            
            DB::rollBack();
        }

        
        return redirect()->route('admin.ejecuciones.index')->with('info', 'Se creo con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ejecuciones $ejecucione)
    {
        /* dd($ejecucione->servicio); */        
        return view('admin.ejecuciones.show',compact('ejecucione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ejecuciones $ejecuciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEjecucionesRequest $request, Ejecuciones $ejecuciones)
    {
        $ejecuciones->update($request->all());                    
        $ejecuciones->servicio()->sync($request->input('servicio_id',[]));  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ejecuciones $ejecucione)
    {
        $ejecucione->delete();              
        return redirect()->route('admin.ejecuciones.index')->with('info','se elimino con exito');
    }
}

