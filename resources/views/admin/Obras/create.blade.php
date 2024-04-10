@extends('adminlte::page')
@section('title', 'Obras')


@section('content_header')
    <h1>Administracion de Obras</h1>
@stop

@section('content')
    <p>Ingrese Informacion</p>
    <form action="{{route('admin.obras.store')}}" method="POST">
    @csrf
    <div class="card">
        <div class="card-body">            
            <x-adminlte-input type="text" name="name" label="Nombre de la Obra"
                placeholder="Texte el Nombre de la Obra" label-class="text-lightblue" AutoSize>
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-car text-lightblue car-sport-outline"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
            <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save"/>
    </form>      
        </div>
    </div>
@stop
