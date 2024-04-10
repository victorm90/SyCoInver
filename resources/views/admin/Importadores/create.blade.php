@extends('adminlte::page')
@section('title', 'Importadores')

@section('content_header')
    <h1>Crear Nuevo Importador</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.importadores.store', 'autocomplete'=>'off'])!!}

                
                @include('admin.importadores.partials.from')
                
                <div class="card-footer">
                    {!! Form::submit('Agregar', ['class'=>'btn btn-primary']) !!}
                </div> 
            {!! Form::close() !!}
        </div>
    </div>
@stop