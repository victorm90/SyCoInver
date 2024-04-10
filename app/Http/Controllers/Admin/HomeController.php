<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Ejecutors;
use App\Models\Instalaciones;
use App\Models\Obra;
use App\Models\Plan;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\User;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController extends Controller
{
    public function index()
    {

        $chart_options = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'week',
            'chart_type' => 'bar',
            'filter_field' => 'created_at',
            'filter_days' => 30, // show only last 30 days
        ];
    
        $chart1 = new LaravelChart($chart_options);
    
    
       /*  $chart_options = [
            'chart_title' => 'Users by names',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\User',
            'group_by_field' => 'name',
            'chart_type' => 'pie',
            'filter_field' => 'created_at',
            'filter_period' => 'month', // show users only registered this month
        ];    
        $chart2 = new LaravelChart($chart_options);
    
        $chart_options = [
            'chart_title' => 'Transactions by dates',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Ejecuciones',
            'group_by_field' => 'costototal',
            'group_by_period' => 'day',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',
            'chart_type' => 'line',
        ];    
        $chart3 = new LaravelChart($chart_options); */
        
        $users_count = User::count();
        $obras = Obra::count();
        $instalacione = Instalaciones::count();
        $ejecutore = Ejecutors::count();
        return view('admin.index', compact('users_count','obras','instalacione','ejecutore','chart1'));                
    }
}
