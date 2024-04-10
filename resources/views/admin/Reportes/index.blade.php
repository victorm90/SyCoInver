@extends('adminlte::page')
@section('title', 'Reportes')

@section('plugins.Sweetalert2', true)

@section('content_header')

@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="">Dashboard</h1>
        </div>
    </div>
    <h1>Reportes</h1>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        @include('admin.reportes.search')
    </div>
</div>
<div class="card">
    <div class="header">
        <div class="card-body">
            @php
                $heads = ['ID', 'Usuario','Fecha de Registro','Registro'];
                $btnEdit = '';
                $btnDelete = '';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details"> <i class="fa fa-lg fa-fw fa-eye"></i> </button>';
                $config = [];
            @endphp
            <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config" striped hoverable with-buttons bordered compressed>
                @foreach ($ejecutor as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->user->name}}</td>                     
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
</div>
@stop

@section('footer')
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; FuelSySteM 2024 | Beta 1.0.2 | ® UEB INMOBILIARIA
                    GUANTANAMO </div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   
@stop
