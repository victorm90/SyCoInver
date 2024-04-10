@extends('adminlte::page')
@section('title', 'Log')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <img src="/imagen/log.png" alt="">
        </div>
    </div>
@stop

@section('content')    
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            @php
                $heads = ['ID', 'Instalacion', 'Cadena Hotelera'];
                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar"><i class="fa fa-lg fa-fw fa-trash"></i> </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details"> <i class="fa fa-lg fa-fw fa-eye"></i> </button>';
                $config = [];
            @endphp

            <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                bordered compressed>
                @foreach ($actividades as $actividad)
                    <tr>
                        <td>{{ $actividad->id }}</td>
                        <td>{{ $actividad->properties }}</td>
                        
                        <td>{{ $actividad->causer->name }}</td>                        
                    </tr>                    
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
@stop


@section('css')    

@section('js')
 
@stop