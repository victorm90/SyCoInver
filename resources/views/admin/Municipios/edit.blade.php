@extends('adminlte::page')
@section('title', 'Municipios')


@section('content_header')
    <h1>Editar municipio</h1>
@stop

@section('content')
    <p>Ingrese Informacion</p>
    <form action="{{route('admin.municipios.update', $municipio)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="card">        
        <div class="card-body">
            
            <x-adminlte-input type="text" name="name" label="Nombre de municipio"
                label-class="text-lightblue" value="{{$municipio->name}}" AutoSize>
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fa fa-user-circle text-lightblue car-sport-outline"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-button type="submit" label="Actualizar" theme="primary" icon="fas fa-save"/>
    </form>      
        </div>
    </div>
@stop
@section('js')
    @if (session("info"))
        <script>
            $(document).ready(function(){
                let mensaje = "{{session('info')}}";
                swal.fire{(
                    'title': 'Resultado',
                    'text': mensaje,
                    'icon': 'seccess'
                )}
            })
        </script>        
    @endif
@stop
