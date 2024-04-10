@extends('adminlte::page')
@section('title', 'Gastos')


@section('content_header')
    <h1>Editar Gasto</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            
            {!! Form::model($gasto, ['route' => ['admin.gastos.update', $gasto], 'method' => 'PUT', ]) !!}

                @include('admin.gastos.partials.from')
                
                <div class="card-footer">
                    {!! Form::submit('Agregar', ['class'=>'btn btn-primary']) !!}
                </div> 

            {!! Form::close() !!}
        </div>
    </div>
@stop