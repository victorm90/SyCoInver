@extends('adminlte::page')
@section('title', 'Entidades')

@section('content_header')
<div class="card">
    <div class="card-body">
        <img src="/imagen/log.png" alt="">
    </div>
</div>
<a>Registro de Gastos</a>
<form action="{{ route('admin.gastos.store') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <x-adminlte-input name="name" label="Nombre del Gasto" placeholder="texte el nombre del gasto"
                            disabled="disabled" id="name" label-class="text-lightblue" class="form-control">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
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
<a>Listado de Gastos</a>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            @php
                $heads = ['ID', 'GASTO', ['label' => 'Accion', 'no-export' => true, 'width' => 8]];
                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar"><i class="fa fa-lg fa-fw fa-trash"></i> </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details"> <i class="fa fa-lg fa-fw fa-eye"></i> </button>';
                $config = [];
            @endphp

            <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                bordered compressed>
                @foreach ($gastos as $gasto)
                    <tr>
                        <td>{{ $gasto->id }}</td>
                        <td>{{ $gasto->name }}</td>
                        <td>
                            @if (Auth::user()->roles[0]->name == 'Operador' || Auth::user()->roles[0]->name == 'Admin')
                                <a href="{{ route('admin.gastos.edit', $gasto) }}"class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                    <i class="fa fa-lg fa-fw fa-pen"></i></a>
                                <a href="" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalPurple{{ $gasto->id }}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i></a>
                            @endif
                        </td>
                    </tr>
                    <div class="modal fade" id="modalPurple{{$gasto->id}}" tabindex="-1" role="dialog"
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
                                    ¿Está seguro de que desea eliminar el usuario {{ $gasto->name }} ...?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancelar</button>
                                    <form style="display:inline" action="{{ route('admin.gastos.destroy', $gasto) }}"
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
        }
    </script>
@stop