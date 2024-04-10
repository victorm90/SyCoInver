@extends('adminlte::page')
@section('title', 'Entidades')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <img src="/imagen/log.png" alt="">
        </div>
    </div>
    <a>Registro de instalaciones</a>
    <form action="{{ route('admin.instalaciones.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <x-adminlte-input name="name" label="Nombre de la Instalacion"
                                placeholder="texte el nombre de la instalacion" disabled="disabled" id="name"
                                label-class="text-lightblue" class="form-control">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-user text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <x-adminlte-select-bs name="cadena_id" id="cadena_id" label="Cadena Hotelera"
                                label-class="text-lightblue" title="Seleccione una Opcion"
                                data-title="Select an option..." data-live-search
                                data-live-search-placeholder="Search..." data-show-tick igroup-size="">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-gradient-info">
                                        <i class="fas fa-building"></i>
                                    </div>
                                </x-slot>
                                @foreach ($cadenas as $cadena)
                                    <option value="{{ $cadena->id }}">{{ $cadena->name }}</option>
                                @endforeach
                            </x-adminlte-select-bs>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <x-adminlte-select-bs name="municipio_id" id="municipio_id" label="Municipio"
                                label-class="text-lightblue" title="Seleccione una Opcion"
                                data-title="Select an option..." data-live-search
                                data-live-search-placeholder="Search..." data-show-tick igroup-size="">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-gradient-info">
                                        <i class="fas fa-building"></i>
                                    </div>
                                </x-slot>
                                @foreach ($municipios as $municipio)
                                    <option value="{{ $municipio->id }}">{{ $municipio->name }}</option>
                                @endforeach
                            </x-adminlte-select-bs>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <x-adminlte-textarea name="detalle" label="Descripcion" rows=5 label-class="text-warning" disabled="disabled"
                                igroup-size="sm" placeholder="Insert description...">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-dark">
                                        <i class="fas fa-lg fa-file-alt text-warning"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-textarea>
                        </div>
                    </div>
                </div>
                @if (Auth::user()->roles[0]->name == 'Operador' || Auth::user()->roles[0]->name == 'Admin')
                    <a class="btn btn-outline-dark position-relative  btn-sm rounded fas fa-thumbs-up fa-lg"title="Agregar Nuevo Usuario"
                        onClick="activar()" value="activar">Nuevo</a>
                    <x-adminlte-button type="submit" label="Añadir" icon="fas fa-save"
                        class="btn-sm btn btn-outline-dark  rounded center" />
                @endif
            </div>
        </div>
    </form>
@stop

@section('content')
    <a>Listado de instalaciones</a>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            @php
                $heads = ['ID', 'Instalacion', 'Cadena Hotelera','Municipio',  ['label' => 'Accion', 'no-export' => true, 'width' => 8]];
                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar"><i class="fa fa-lg fa-fw fa-trash"></i> </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details"> <i class="fa fa-lg fa-fw fa-eye"></i> </button>';
                $config = [];
            @endphp

            <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                bordered compressed>
                @foreach ($instalaciones as $instalacion)
                    <tr>
                        <td>{{ $instalacion->id }}</td>
                        <td>{{ $instalacion->name }}</td>
                        <td>{{ $instalacion->cadena->name }}</td>
                        <td>{{ $instalacion->municipio->name }}</td>
                        <td>
                            @if (Auth::user()->roles[0]->name == 'Operador' || Auth::user()->roles[0]->name == 'Admin')
                                <a href="{{ route('admin.instalaciones.edit', $instalacion) }}"class="btn btn-xs btn-default text-primary mx-1 shadow"
                                    title="Editar">
                                    <i class="fa fa-lg fa-fw fa-pen"></i></a>
                                <a href="" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"
                                    data-toggle="modal" data-target="#modalPurple{{ $instalacion->id }}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i></a>
                            @endif
                        </td>
                    </tr>
                    <div class="modal fade" id="modalPurple{{ $instalacion->id }}" tabindex="-1" role="dialog"
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
                                    ¿Está seguro de que desea eliminar la Cadena {{ $instalacion->name }} ...?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <form style="display:inline"
                                        action="{{ route('admin.instalaciones.destroy', $instalacion) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"
        integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA=="
        crossorigin="anonymous"></script>
@stop

@section('js')

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css"
integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg=="
crossorigin="anonymous" />

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.formEliminar').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Estas seguro?",
                    text: "Se va a eliminar un registro!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                })
            })
        })
    </script>

    <script>
        function activar() {
            document.getElementById("name").disabled = false;
            document.getElementById("detalle").disabled = false;
        }
    </script>
@stop
