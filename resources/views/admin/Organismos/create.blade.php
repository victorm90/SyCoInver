@extends('adminlte::page')
@section('title', 'Organismos')

@section('content_header')
    <h1>Crear Nuevo Organismo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.organismos.store', 'autocomplete'=>'off'])!!}
                
                @include('admin.organismos.partials.from')
                
                <div class="card-footer">
                    {!! Form::submit('Agregar', ['class'=>'btn btn-primary']) !!}
                </div> 
            {!! Form::close() !!}
        </div>
    </div>
@stop