@extends('adminlte::page')
@section('title', 'Organismos')


@section('content_header')
    <h1>Editar Organismos</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">            
            {!! Form::model($organismo, ['route' => ['admin.organismos.update', $organismo], 'method' => 'PUT', ]) !!}

                @include('admin.organismos.partials.from')
                
                <div class="card-footer">
                    {!! Form::submit('Agregar', ['class'=>'btn btn-primary']) !!}
                </div> 

            {!! Form::close() !!}
        </div>
    </div>
@stop