@extends('adminlte::page')
@section('title', 'Entidades')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <img src="/imagen/log.png" alt="">
        </div>
    </div>
    <a>Registro de Entidades</a>
    <form action="{{ route('admin.entidades.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <x-adminlte-input name="name" label="Nombre Entidad" placeholder="UEB ...."
                                disabled="disabled" id="name" label-class="text-lightblue" class="form-control">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-user text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <x-adminlte-input name="addres" label="Direccion" placeholder="calle 3 esq A"
                                disabled="disabled" id="addres" label-class="text-lightblue" class="form-control">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fa fa-address-card text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <x-adminlte-input name="creeup" id="codreeup" label="Codigo Reeup"
                                label-class="text-lightblue" placeholder="codreeup" disabled="disabled" type="number"
                                igroup-size="" min=1 max=1099999999999999>
                                <x-slot name="appendSlot">
                                    <div class="input-group-text bg-dark"></div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <x-adminlte-input name="telefono" id="telefono" label="Num Telefono"
                                label-class="text-lightblue" placeholder="55550269" disabled="disabled" type="number"
                                igroup-size="" min=1 max=1099999999999999>
                                <x-slot name="appendSlot">
                                    <div class="input-group-text bg-dark"></div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <x-adminlte-input name="email" label="Email" placeholder="username@example.com"
                                disabled="disabled" id="email" label-class="text-lightblue">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-at text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <x-adminlte-select-bs name="provincia_id" label="Provincia" label-class="text-lightblue"
                                title="Seleccione una Opcion" data-title="Select an option..." data-live-search
                                data-live-search-placeholder="Search..." data-show-tick igroup-size="">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-gradient-info">
                                        <i class="fas fa-building"></i>
                                    </div>
                                </x-slot>
                                @foreach ($provincias as $provincia)
                                    <option value="{{ $provincia->id }}">{{ $provincia->name }}</option>
                                @endforeach
                            </x-adminlte-select-bs>
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
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <a>Listado de Entidades</a>
    <div class="card">
        <div class="card-body">
            @php
                $heads = ['ID', 'Nombre de Entidad', 'Direccion', 'CodReeup', 'Telefono', 'Email', 'Provincia', ['label' => 'Accion', 'no-export' => true, 'width' => 8]];
                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar"><i class="fa fa-lg fa-fw fa-trash"></i> </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details"> <i class="fa fa-lg fa-fw fa-eye"></i> </button>';
                $config = [];
            @endphp

            <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                bordered compressed>
                @foreach ($entidades as $entidade)
                    <tr>
                        <td>{{ $entidade->id }}</td>
                        <td>{{ $entidade->name }}</td>
                        <td>{{ $entidade->addres }}</td>
                        <td>{{ $entidade->creeup }}</td>
                        <td>{{ $entidade->telefono }}</td>
                        <td>{{ $entidade->email }}</td>
                        <td>{{ $entidade->provincia->name }}</td>
                        <td>
                            {{-- @can('admin.tarjetas.edit') --}}
                            <a href="{{ route('admin.entidades.edit', $entidade) }}"class="btn btn-xs btn-default text-primary mx-1 shadow"
                                title="Editar"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                            @if (Auth::user()->roles[0]->name == 'Admin')
                                <a href="" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"
                                    data-toggle="modal" data-target="#modalPurple{{ $entidade->id }}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i></a>
                            @endif
                        </td>
                    </tr>
                    <div class="modal fade" id="modalPurple{{ $entidade->id }}" tabindex="-1" role="dialog"
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
                                    ¿Está seguro de que desea eliminar el usuario {{ $entidade->name }} ...?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancelar</button>
                                    <form style="display:inline"
                                        action="{{ route('admin.entidades.destroy', $entidade) }}" method="POST">
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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <script>
        function activar() {
            document.getElementById("name").disabled = false;
            document.getElementById("telefono").disabled = false;
            document.getElementById("email").disabled = false;
            document.getElementById("codreeup").disabled = false;
            document.getElementById("addres").disabled = false;
            document.getElementById("fecha").disabled = false;
        }
    </script>
@stop
