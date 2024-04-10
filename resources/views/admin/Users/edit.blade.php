@extends('adminlte::page')
@section('title', 'Admin')


@section('content_header')
    <div class="card">
        <div class="card-body">
            <img src="/imagen/log.png" alt="">
        </div>
    </div>
    <h1>Asignar un rol</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre:</p>
            <p class="form-control">{{ $user->name }}</p>
            <h2 class="h5">Listado de Roles</h2>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
            @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, $user->hasAnyRole($role->id) ?: false, ['class' => 'mr-1']) !!}
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach
            {!! Form::submit('Asignar Rol', ['class' => 'btn btn-primary mt-5']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
        Swal.fire('success') 
    </script>
@stop --}}
