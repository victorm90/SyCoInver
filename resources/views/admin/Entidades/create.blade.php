@extends('adminlte::page')
@section('title', 'Entidades')

@section('content_header')
    <h1>Crear Nueva Entidad</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.entidades.store', 'autocomplete'=>'off'])!!}

                
                @include('admin.entidades.partials.from')
                
                <div class="card-footer">
                    {!! Form::submit('Agregar', ['class'=>'btn btn-primary']) !!}
                </div>
                  
                
                

            {!! Form::close() !!}
             

        </div>
        
    </div>
@stop

