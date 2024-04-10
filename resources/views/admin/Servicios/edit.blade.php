@extends('adminlte::page')
@section('title', 'Servicios')


@section('content_header')
    <h1>Editar servicios</h1>
@stop

@section('content')
    <p>Ingrese Informacion</p>
    <form action="{{route('admin.servicios.update', $servicio)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="card">        
        <div class="card-body">
            
            <x-adminlte-input type="text" name="name" label="Nombre del servicio"
                label-class="text-lightblue" value="{{$servicio->name}}" AutoSize>
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fa fa-user-circle text-lightblue car-sport-outline"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save"/>
    </form>      
        </div>
    </div>
@stop