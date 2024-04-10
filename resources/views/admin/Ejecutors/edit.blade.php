@extends('adminlte::page')
@section('title', 'Entidades')


@section('content_header')
<div class="card">
    <div class="card-body">
        <img src="/imagen/log.png" alt="">
    </div>
</div>
    <h1>Editar Ejecutores</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($ejecutor, ['route' => ['admin.ejecutors.update', $ejecutor], 'method' => 'PUT']) !!}

            <div class="form-group">
            {!! Form::label('name', 'Nombre del Ejecutor:') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('ncontrato', 'Num Contrato:') !!}
            {!! Form::number('ncontrato', null, ['class' => 'form-control', 'placeholder' => '']) !!}
            @error('ncontrato')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('fecha_cont', 'Fecha de Contrato:') !!}
            {!! Form::date('fecha_cont', null, ['class' => 'form-control', 'placeholder' => '']) !!}
            @error('fecha_cont')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        {{-- <div class="form-group">
            {!! Form::label('valor', 'Valor del Contrato:') !!}
            {!! Form::number('valor', null, ['class' => 'form-control', 'placeholder' => '']) !!}
            @error('valor')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div> --}}
        <div class="form-group">
            {!! Form::label('fecha_ven_cont', 'Fecha de Vencimiento del Contrato:') !!}
            {!! Form::date('fecha_ven_cont', null, ['class' => 'form-control', 'placeholder' => '']) !!}
            @error('fecha_ven_cont')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('telefono', 'Telefono:') !!}
            {!! Form::number('telefono', null, ['class' => 'form-control', 'placeholder' => '']) !!}
            @error('creeup')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('addres', 'Direccion de la Entidad:') !!}
            {!! Form::text('addres', null, [
                'class' => 'form-control',
                'placeholder' => 'Ingrese la dirección de la Entidad',
            ]) !!}
            @error('addres')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('provincia_id', 'Provincia:') !!}
            {!! Form::select('provincia_id', $provincias, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('tipo_id', 'Tipo de Empresa:') !!}
            {!! Form::select('tipo_id', $tipos, null, ['class' => 'form-control']) !!}
        </div>
        <div class="card-footer">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    </div>
@stop
