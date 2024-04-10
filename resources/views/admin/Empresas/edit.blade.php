@extends('adminlte::page')
@section('title', 'Empresas')


@section('content_header')
    <h1>Editar Empresas</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">            
            {!! Form::model($empresa, ['route' => ['admin.empresas.update', $empresa], 'method' => 'PUT', ]) !!}

                @include('admin.empresas.partials.from')
                
                <div class="card-footer">
                    {!! Form::submit('Agregar', ['class'=>'btn btn-primary']) !!}
                </div> 

            {!! Form::close() !!}
        </div>
    </div>
@stop