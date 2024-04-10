@extends('adminlte::page')
@section('title', 'Municipios')

@section('content_header')

    <p>Ingrese Informacion</p>
    <form action="{{ route('admin.municipios.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg">
                        <div class="form-group">
                            <x-adminlte-input type="text" name="name" label="Nombre del Municipio" disabled="disabled"
                                id="name" placeholder="......" label-class="text-lightblue"
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
        <p>Listado de municipios</p>
        @if (Auth::user()->roles[0]->name == 'Operador' || Auth::user()->roles[0]->name == 'Admin')
            <a class="btn btn-outline-dark position-relative  btn-sm rounded fas fa-thumbs-up fa-lg"title="Agregar Nueva municipio"
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
                    $heads = ['ID', 'Nombre de la Municipio', ['label' => 'Accion', 'no-export' => true, 'width' => 8]];
                    $btnEdit = '';
                    $btnDelete = '';
                    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details"> <i class="fa fa-lg fa-fw fa-eye"></i> </button>';
                    $config = [];
                @endphp
                <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                    bordered compressed>
                    @foreach ($municipios as $municipio)
                        <tr>
                            <td>{{ $municipio->id }}</td>
                            <td>{{ $municipio->name }}</td>
                            <td>
                                @if (Auth::user()->roles[0]->name == 'Operador' || Auth::user()->roles[0]->name == 'Admin')
                                    <a href="{{ route('admin.municipios.edit', $municipio) }}"class="btn btn-xs btn-default text-primary mx-1 shadow"
                                        title="Editar"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                                @endif
                                @if (Auth::user()->roles[0]->name == 'Admin')
                                <a href="" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalPurple{{$municipio->id}}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i></a>
                                @endif
                            </td>
                        </tr>
                        <div class="modal fade" id="modalPurple{{$municipio->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModal">Confirmar eliminación</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Está seguro de que desea eliminar la municipio {{ $municipio->name }} ...?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancelar</button>
                                        <form style="display:inline" action="{{ route('admin.municipios.destroy', $municipio) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                            {!! $btnDelete !!}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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