@extends('adminlte::page')
@section('title', 'Admin')


@section('content_header')
    <div class="card">
        <div class="card-body">
            <img src="/imagen/log.png" alt="">
        </div>
    </div>
    <h1>Lista de Permisos</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <x-adminlte-button class="" type="submit" label="Nuevo Permiso" theme="dark" icon="fas fa-save" data-toggle="modal" data-target="#modalPurple" />
        </div>
        <div class="card-body">
            @php
                $heads = ['ID', 'Permiso', 'Descripcion', ['label' => 'Accion', 'no-export' => true, 'width' => 8]];
                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"><i class="fa fa-lg fa-fw fa-trash"></i> </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details"> <i class="fa fa-lg fa-fw fa-eye"></i> </button>';
                $config = [];
            @endphp
            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                bordered compressed>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->descripcion }}</td>
                        <td><a href="{{ route('admin.permisos.edit', $permission) }}"
                                class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            <form style="display:inline" action="{{ route('admin.permisos.destroy', $permission) }}"
                                method="POST">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                        </td>
                        </form>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
    <x-adminlte-modal id="modalPurple" title="Nuevo Permiso" theme="dark" icon="fas fa-bolt" size='lg'
        disable-animations>
        <form action="{{ route('admin.permisos.store') }}" method="post">
            @csrf
            <div class="row">
                <x-adminlte-input name="name" label="Nombre del permiso" placeholder="Tecle el nombre del permiso....."
                    fgroup-class="col-md-6" disable-feedback />
            </div>
            <x-adminlte-button type="submit" label="Guardar" theme="dark" icon="fas fa-thumbs-up" />
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
