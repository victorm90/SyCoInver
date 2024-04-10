@extends('adminlte::page')
@section('title', 'Provincias')


@section('content_header')
    <h1>Administracion de Provincias</h1>
@stop

@section('content')
    <p>Ingrese Informacion</p>
    <form action="{{route('admin.provincias.store')}}" method="POST">
    @csrf
    <div class="card">
        <div class="card-body">            
            <x-adminlte-input type="text" name="name" label="Nombre de la Provincia"
                placeholder="Texte el Nombre de la Provincia" label-class="text-lightblue" AutoSize>
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
