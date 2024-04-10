@extends('adminlte::page')
@section('title', 'Admin')


@section('content_header')
<div class="card">
    <div class="card-body">
        <img src="/imagen/log.png" alt="">
    </div>
</div>
    <h1>Roles y Permisos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            {{-- @foreach ($roles as $role) --}}
                <p>{{ $role->name }}</p>
            {{-- @endforeach --}}
        </div>

        <div class="card-body">
            <h5 >Lista de Permisos</h5>
            {!! Form::model($role, ['route' =>['admin.roles.update',$role],'method'=>'put']) !!}
            @foreach ($permissions as $permission)
                <div>
                    <label>
                        {!! Form::checkbox('permissions[]', $permission->id, $role->hasPermissionTo($permission->id) ? : false , ['class'=>'mr-1']) !!}
                        {{$permission->descripcion}}
                    </label>
                </div>
            @endforeach

            {!! Form::submit('Asignar Permiso', ['class'=>'btn btn-primary mt-5' ]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        Swal.fire('Acceso Aceptado')
    </script>
@stop
 --}}