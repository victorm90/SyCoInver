@extends('adminlte::page')
@section('title', 'Servicios')


@section('content_header')
    <h1>Administracion de Servicios</h1>
@stop

@section('content')
    <p>Ingrese Informacion</p>
    <form action="{{route('admin.servicios.store')}}" method="POST">
    @csrf
    <div class="card">
        <div class="card-body">            
            <x-adminlte-input type="text" name="name" label="Nombre del Servicio"
                placeholder="Texte nombre.." label-class="text-lightblue" AutoSize>
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
