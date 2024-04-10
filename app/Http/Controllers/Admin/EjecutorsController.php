<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ejecutors;
use App\Models\Provincia;
use App\Http\Requests\StoreEjecutorsRequest;
use App\Http\Requests\UpdateEjecutorsRequest;
use App\Models\Servicios;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Event;
use App\Models\Tipos;

class EjecutorsController extends Controller
{
    /*  public function __construct()
    {
      $this->middleware('can:admin.combustibles.index')->only('index');
      $this->middleware('can:admin.combustibles.create')->only('create','store');
      $this->middleware('can:admin.combustibles.edit')->only('edit','update'); 
      $this->middleware('can:admin.combustibles.destroy')->only('destroy');       
    } */

    public function index()
    {
        $ejecutors = Ejecutors::with(['provincia', 'servicio','tipo'])->get();
        $provincias = Provincia::all();
        $servicio = Servicios::all();
        $tipos = Tipos::all();
        $ejecutorss = Ejecutors::where('estado', true)->get();
        
        foreach ($ejecutorss as $ejecutor) {
            $fechaEmision = Carbon::parse(Carbon::now());
            $fechaExpiracion = Carbon::parse($ejecutor->fecha_ven_cont);

            /* $fechaIngresada = Carbon::parse($ejecutor->fecha_ven_cont);
            $hoy = Carbon::now(); */ 

            $diasDiferencia = $fechaExpiracion->diffInDays($fechaEmision);
            $ejecutor->dayoff = $diasDiferencia;
            $ejecutor->save();
            if ($ejecutor->dayoff <= 0) {
                $ejecutor->estado = 0;
                $ejecutor->save();            }
        }

        
                 
            
        

        return view('admin.ejecutors.index', compact('ejecutors', 'provincias', 'servicio','tipos'));
    }
    public function create()
    {
        return view('admin.ejecutors.create');
    }

    public function store(StoreEjecutorsRequest $request)
    {

        if ($request->validated()) {
            try {
                DB::beginTransaction();

                /* $ejecutors = Ejecutors::create($request->validated()); */

                $nuevo_modelo = new Ejecutors();

                $nuevo_modelo->name = $request->get('name');
                $nuevo_modelo->addres = $request->get('addres');
                $nuevo_modelo->telefono = $request->get('telefono');
                $nuevo_modelo->ncontrato = $request->get('ncontrato');
                $nuevo_modelo->tipo_id = $request->get('tipo_id');
                $nuevo_modelo->provincia_id = $request->get('provincia_id');
                $nuevo_modelo->fecha_cont = $request->get('fecha_cont');
                $nuevo_modelo->valorhidden = $request->get('valorhidden');
                $nuevo_modelo->fecha_ven_cont = $request->get('fecha_ven_cont');


                $fechaEmision = Carbon::parse(Carbon::now());
                $fechaExpiracion = Carbon::parse($request->input('fecha_ven_cont'));
                $diasDiferencia = $fechaExpiracion->diffInDays($fechaEmision);

                $nuevo_modelo->dayoff = $diasDiferencia;
                $nuevo_modelo->user_id = auth()->id();
                $nuevo_modelo->save();
                $arrayidservicio = $request->get('arrayidservicio');
                $arraycostoMN = $request->get('arraycostoMN');
                $arraycostoUSD = $request->get('arraycostoUSD');

                $siseArray = count($arrayidservicio);
                $cont = 0;
                while ($cont < $siseArray) {
                    $nuevo_modelo->servicio()->syncWithoutDetaching([
                        $arrayidservicio[$cont] => [
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



            return redirect()->route('admin.ejecutors.index')->with('info', 'Se creo con éxito');
        } else {
            dd('error papa');
        }
    }


    public function show(Ejecutors $ejecutor)
    {    
        return view('admin.ejecutors.show', compact('ejecutor'));
    }
    public function edit(Ejecutors $ejecutor)
    {
        $provincias = Provincia::pluck('name', 'id');
        $tipos = Tipos::pluck('name', 'id');
        return view('admin.ejecutors.edit', compact('ejecutor', 'provincias','tipos'));
    }
    public function update(UpdateEjecutorsRequest $request, Ejecutors $ejecutor)
    {
        $ejecutor->update($request->all());
        return redirect()->route('admin.ejecutors.index', $ejecutor)->with('info', 'Se Actualizo con éxito');
    }
    public function destroy(Ejecutors $ejecutor)
    {
        if ($ejecutor->estado == 1) {
            $ejecutor = Ejecutors::where('id', $ejecutor->id)->update([
                'estado' => 0
            ]);
        } else {
            $ejecutor = Ejecutors::where('id', $ejecutor->id)->update([
                'estado' => 1
            ]);
        }
        return redirect()->route('admin.ejecutors.index', $ejecutor)->with('info', 'Operacion exitosa');
    }
}
