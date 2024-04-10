@extends('adminlte::page')
@section('title', 'Importadores')


@section('content_header')
    <h1>Editar Importadores</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">            
            {!! Form::model($importadore, ['route' => ['admin.importadores.update', $importadore], 'method' => 'PUT', ]) !!}

                @include('admin.importadores.partials.from')
                
                <div class="card-footer">
                    {!! Form::submit('Agregar', ['class'=>'btn btn-primary']) !!}
                </div> 

            {!! Form::close() !!}
        </div>
    </div>
@stop