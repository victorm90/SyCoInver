@extends('adminlte::page')
@section('title', 'Entidades')


@section('content_header')
    <h1>Editar Entidad</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            
            {!! Form::model($entidade, ['route' => ['admin.entidades.update', $entidade], 'method' => 'PUT', ]) !!}

                @include('admin.entidades.partials.from')
                
                <div class="card-footer">
                    {!! Form::submit('Agregar', ['class'=>'btn btn-primary']) !!}
                </div> 

            {!! Form::close() !!}
        </div>
    </div>
@stop
