@extends('adminlte::page')
@section('title', 'Importadores')

@section('content_header')

    <h1 class="text-center">Listado de Importadores</h1>

    @if (Auth::user()->roles[0]->name == 'Operador' || Auth::user()->roles[0]->name == 'Admin')
        <a class="btn btn-outline-dark position-relative  btn-sm rounded fas fa-thumbs-up fa-lg"
            title="Agregar Nuevo Importador
        "href="{{ route('admin.importadores.create') }}">Agregar Nuevo</a>
    @endif
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="header" >                       
            <div class="card-body">
                @php
                    $heads = ['ID', 'Nombre', ['label' => 'Accion', 'no-export' => true, 'width' => 8]];
                    $btnEdit = '';
                    $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar"><i class="fa fa-lg fa-fw fa-trash"></i> </button>';
                    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details"> <i class="fa fa-lg fa-fw fa-eye"></i> </button>';
                    $config = [];
                @endphp

                <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                    bordered compressed>
                    @foreach ($importadores as $importadore)
                        <tr>
                            <td>{{ $importadore->id }}</td>
                            <td>{{ $importadore->name }}</td>
                            <td>
                                @if (Auth::user()->roles[0]->name == 'Operador' || Auth::user()->roles[0]->name == 'Admin')
                                    <a href="{{ route('admin.importadores.edit', $importadore) }}"class="btn btn-xs btn-default text-primary mx-1 shadow"
                                        title="Editar"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                                @endif
                                @if (Auth::user()->roles[0]->name == 'Admin')
                                    <form style="display:inline"
                                        action="{{ route('admin.importadores.destroy', $importadore) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        {!! $btnDelete !!}
                                    </form>
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
