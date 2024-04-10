@extends('adminlte::page')
@section('title', 'Admin')


@section('content_header')
    <h1>Crear nuevo Rol</h1>
@stop

@section('content')
    <div class="card-card">
        <div class="card-bady">

            {!! Form::open(['route' => 'admin.roles.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre', ) !!}
                    {!! Form::text('name', null, ['class'=> 'form-control', 'placeholder'=>'Ingrese el nombre del rol']) !!}
                </div>

                @error('name')
                    <small class="text-danger">
                        {{$message}}
                    </small>
                    
                @enderror

                <h2 class="h3">Lista de Permisos</h2>

                @foreach ($permissions as $permission)
                <div>
                    <label for="">
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
                        {{$permission->description}}
                    </label>
                </div>
                    
                @endforeach

                {!! Form::submit('Crear Rol', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

