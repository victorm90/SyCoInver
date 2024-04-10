@extends('adminlte::page')
@section('title', 'Codigo')

@section('content_header')
    <p>Ingrese Informacion</p>
    <form action="{{ route('admin.codigo.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg">
                        <div class="form-group">
                            <x-adminlte-input type="text" name="name" label="Nombre de la codigo" disabled="disabled"
                                id="name" placeholder="Texte el Nombre de la codigo" label-class="text-lightblue"
                                AutoSize>
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fa fa-user-circle text-lightblue car-sport-outline"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p>Listado de codigos</p>
        @if (Auth::user()->roles[0]->name == 'Operador' || Auth::user()->roles[0]->name == 'Admin')
            <a class="btn btn-outline-dark position-relative  btn-sm rounded fas fa-thumbs-up fa-lg"title="Agregar Nueva codigo"
                onClick="activar()" value="activar">Nuevo</a>
            <x-adminlte-button type="submit" label="Añadir" icon="fas fa-save"
                class="btn-sm btn btn-outline-dark  rounded center" />
        @endif
    </form>
@stop
@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="header">
            <div class="card-body">
                @php
                    $heads = ['ID', 'Nombre de la codigo', ['label' => 'Accion', 'no-export' => true, 'width' => 8]];
                    $btnEdit = '';
                    $btnDelete = '';
                    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details"> <i class="fa fa-lg fa-fw fa-eye"></i> </button>';
                    $config = [];
                @endphp
                <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                    bordered compressed>
                    @foreach ($codigos as $codigo)
                        <tr>
                            <td>{{ $codigo->id }}</td>
                            <td>{{ $codigo->name }}</td>
                            <td>
                                @if (Auth::user()->roles[0]->name == 'Operador' || Auth::user()->roles[0]->name == 'Admin')
                                    <a href=""class="btn btn-xs btn-default text-primary mx-1 shadow" data-toggle="modal" data-target="#editModal{{ $codigo->id }}"
                                        title="Editar"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                                        @include('admin.codigos.edit')
                                @endif
                                @if (Auth::user()->roles[0]->name == 'Admin')
                                <a href="" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalPurple{{$codigo->id}}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i></a>
                                    @include('admin.codigos.delete')
                                @endif
                            </td>
                        </tr>                        
                    @endforeach
                </x-adminlte-datatable>
            </div>
        </div>
    </div>    
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script>
        function activar() {
            document.getElementById("name").disabled = false;
        }
    </script>
@stop