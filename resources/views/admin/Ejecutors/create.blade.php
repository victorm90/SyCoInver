@extends('adminlte::page')
@section('title', 'Ejecutores')

@section('content_header')
    <h1>Crear Nuevos Ejecutores</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.ejecutors.store', 'autocomplete' => 'off']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre del Ejecutor:') !!}
                {!! Form::text('name', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese el nombre de la Entidad ejecutora',
                ]) !!}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('telefono', 'Telefono:') !!}
                {!! Form::text('telefono', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese la dirección de la Entidad',
                ]) !!}
                @error('telefono')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group " >
                {!! Form::label('addres', 'Direccion:') !!}                
                {!! Form::text('addres', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la Entidad']) !!}                
                @error('addres')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('provincia_id', 'Provincia:') !!}
                {!! Form::select('provincia_id', $provincias, null, [
                    'class' => 'form-control',
                    'placeholder' => 'Seleccione una provincia...',
                ]) !!}

            </div>

            <div class="card-footer">
                {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
            </div>




            {!! Form::close() !!}


        </div>

    </div>
@stop
