<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Ejecutors;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $reportes = Ejecutors::WhereDate('fecha_cont', Carbon::today())->get();
        $total = $reportes->sum('valorhidden');
        /* dd($reportes, $total); */
        /*return view('admin.reportes.index', compact('reportes','total')); */               
    }

    /* private function convertDate($date)
    {
        if ($date === null) {
            return null;
        }

        $dt = \DateTime::createFromFormat('d/m/Y', $date);

        if ($dt) {
            return $dt->format('Y-m-d');
        } else {
            return null;
        }
    }

    public function filtrar1(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $fec_email = $this->convertDate($request->input('fec_email'));
            $fec_fin_instalacion = $this->convertDate($request->input('fec_fin_instalacion'));

            $Reportes = DB::table('cliente')
                ->whereBetween('fec_ini_instalacion', [$fec_email, $fec_fin_instalacion])
                ->get();

            return view('Vistas.Reportes.index', [
                "Reportes" => $Reportes,
                "searchText" => $query
            ]);
        }
    } */

    public function filtrar(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');
        
        $ejecutor = Ejecutors::whereBetween('created_at', [$fechaInicio, $fechaFin])->get();
        /* $ejecutor = Ejecutors::with('user')->get(); */
        return view('admin.reportes.index',compact('ejecutor'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
