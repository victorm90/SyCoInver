@extends('adminlte::page')
@section('title', 'Log')

@section('content_header')
<div class="card">
    <div class="card-body">
        <img src="/imagen/log.png" alt="">
    </div>
</div>
<a>Log de Usuarios</a>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            @php
                $heads = ['ID', 'Usuario','Rol','Descipcion','Fecha'];
                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar"><i class="fa fa-lg fa-fw fa-trash"></i> </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details"> <i class="fa fa-lg fa-fw fa-eye"></i> </button>';
                $config = [];
            @endphp

            <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                bordered compressed>
                @foreach ($activityLogs as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->rol }}</td>
                        <td>{{ $item->descripcion}}</td>
                        <td>{{ $item->data_time }}</td>                        
                    </tr>                   
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
@stop

@section('js')

@stop