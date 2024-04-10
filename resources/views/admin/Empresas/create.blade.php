@extends('adminlte::page')
@section('title', 'Empresas')

@section('content_header')
    <h1>Crear Nueva Empresas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.empresas.store', 'autocomplete'=>'off'])!!}

                
                @include('admin.empresas.partials.from')
                
                <div class="card-footer">
                    {!! Form::submit('Agregar', ['class'=>'btn btn-primary']) !!}
                </div> 
            {!! Form::close() !!}
        </div>
    </div>
@stop