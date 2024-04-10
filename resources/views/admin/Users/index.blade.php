@extends('adminlte::page')

@section('title', 'Usuario')


@section('content_header')

    <div class="card">
        <div class="card-body">
            <img src="/imagen/log.png" alt="">
        </div>
    </div>
    
    <a>Registro de Usuario</a>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <x-adminlte-input name="name" label="Nombre y Apellido" placeholder="Jose Perez"
                                disabled="disabled" id="name" label-class="text-lightblue" class="form-control">
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
                            <x-adminlte-input name="usuario" label="Usuario" placeholder="jose.perez" disabled="disabled"
                                id="usuario" label-class="text-lightblue" class="form-control">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas user-circle fa-user-circle  text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <x-adminlte-input name="ci" label="Carnet Identidad" placeholder="01234567890"
                                disabled="disabled" id="ci" label-class="text-lightblue" class="form-control">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-address-book text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-lg-3">
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
                    <div class="col-lg-3">
                        <div class="form-group">
                            <x-adminlte-input name="password" label="Contraseña" placeholder="*********"
                                label-class="text-lightblue" class="form-control" type="password" class="form-control"
                                disabled="disabled" id="inputPassword1" required autocomplete="new-password">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text ">
                                        <i class="fas  fa-eye-slash  text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <x-adminlte-input name="password_confirmation" label="Confirmar Contraseña"
                                placeholder="*********" label-class="text-lightblue" class="visually-hidden" type="password"
                                disabled="disabled" class="form-control" id="inputPassword2" required
                                autocomplete="new-password">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-eye-slash  text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
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
    <a>Listado de Usuario</a>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">            
        </div>
        <div class="card-body">
            @php
                $heads = ['ID', 'Nombre', 'Usuario', 'CI', 'Direccion', 'EMail', ['label' => 'Accion', 'no-export' => true, 'width' => 8]];
                $btnEdit = '';
                $btnDelete = '';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details"> <i class="fa fa-lg fa-fw fa-eye"></i> </button>';
                $config = [];
            @endphp
            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                bordered compressed>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->usuario }}</td>
                        <td>{{ $user->ci }}</td>
                        <td>{{ $user->addres }}</td>
                        <td>{{ $user->email }}</td>
                        <td><a href="{{ route('admin.users.edit', $user) }}"
                                class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                            <a href="" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalPurple{{$user->id}}">
                                <i class="fa fa-lg fa-fw fa-trash"></i></a>                           
                        </td>
                    </tr>
                    <div class="modal fade" id="modalPurple{{$user->id}}" tabindex="-1" role="dialog"
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
                                    ¿Está seguro de que desea eliminar el usuario {{ $user->name }} ...?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancelar</button>
                                    <form style="display:inline" action="{{ route('admin.users.destroy', $user) }}"
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
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
            document.getElementById("usuario").disabled = false;
            document.getElementById("ci").disabled = false;
            document.getElementById("addres").disabled = false;
            document.getElementById("email").disabled = false;
            document.getElementById("inputPassword1").disabled = false;
            document.getElementById("inputPassword2").disabled = false;
        }
    </script>
@stop
