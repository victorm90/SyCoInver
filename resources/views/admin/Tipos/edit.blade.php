@extends('adminlte::page')
@section('title', 'Tipo de Empresa')


@section('content_header')
    <h1>Editar Tipo de Empresa</h1>
@stop

@section('content')
    <p>Ingrese Informacion</p>
    <form action="{{ route('admin.tipos.update', $tipo) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">

                <x-adminlte-input type="text" name="name" label="Tipo de Empresa" label-class="text-lightblue"
                    value="{{ $tipo->name }}" AutoSize>
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-user-circle text-lightblue car-sport-outline"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-textarea name="detalle" label="Descripcion" rows=5 label-class="text-lightblue"
                    igroup-size="sm" value="{{ $tipo->detalle }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-lg fa-file-alt text-warning"></i>
                        </div>
                    </x-slot>
                </x-adminlte-textarea>

                <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save" />
    </form>
    </div>
    </div>
@stop
@section('js')
    @if (session('info'))
        <script>
            $(document).ready(function() {
                let mensaje = "{{ session('info') }}";
                swal.fire {
                    (
                        'title': 'Resultado',
                        'text': mensaje,
                        'icon': 'seccess'
                    )
                }
            })
        </script>
    @endif
@stop
