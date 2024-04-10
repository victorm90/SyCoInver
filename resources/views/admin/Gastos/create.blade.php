@extends('adminlte::page')
@section('title', 'Entidades')

@section('content_header')
    <h1>Crear Nuevo Gasto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.gastos.store', 'autocomplete'=>'off'])!!}

                
                @include('admin.gastos.partials.from')
                
                <div class="card-footer">
                    {!! Form::submit('Agregar', ['class'=>'btn btn-primary']) !!}
                </div> 
            {!! Form::close() !!}
        </div>
    </div>
@stop