@extends('adminlte::page')
@section('title', 'Admin')


@section('content_header')
    <div class="card">
        <div class="card-body">
            <img src="/imagen/log.png" alt="">
        </div>
    </div>
    <h1>Lista de Roles</h1>    
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <x-adminlte-button class="" type="submit" label="Nuevo Rol" theme="dark" icon="fas fa-save"
                data-toggle="modal" data-target="#modalPurple" />
        </div>
        <div class="card-body">
            @php
                $heads = ['ID', 'Nombre del Rol', ['label' => 'Accion', 'no-export' => true, 'width' => 8]];
                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"><i class="fa fa-lg fa-fw fa-trash"></i> </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details"> <i class="fa fa-lg fa-fw fa-eye"></i> </button>';
                $config = [];
            @endphp
            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                bordered compressed>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td><a href="{{ route('admin.roles.edit', $role) }}"
                                class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                            <a href="" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalPurple{{$role->id}}">
                                <i class="fa fa-lg fa-fw fa-trash"></i></a> 
                        </td>                        
                    </tr>
                    <div class="modal fade" id="modalPurple{{$role->id}}" tabindex="-1" role="dialog"
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
                                    ¿Está seguro de que desea eliminar el usuario {{ $role->name }} ...?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancelar</button>
                                    <form style="display:inline" action="{{ route('admin.roles.destroy', $role) }}"
                                        method="POST">
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
    <x-adminlte-modal id="modalPurple" title="Nuevo Rol" theme="dark" icon="fas fa-bolt" size='lg' disable-animations>
        <form action="{{route('admin.roles.store')}}" method="post">
            @csrf
            <div class="row">
                <x-adminlte-input name="name" label="Nombre de Rol" placeholder="tecle el nombre del roll" fgroup-class="col-md-6" disable-feedback />
            </div>
            <x-adminlte-button type="submit" label="Guardar" theme="dark" icon="fas fa-thumbs-up"/>
        </form>
    </x-adminlte-modal>

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
@stop
