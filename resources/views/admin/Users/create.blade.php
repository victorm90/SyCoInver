@extends('adminlte::page')
@section('title', 'Registro')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Registro de Usuario</h1>
@stop

@section('content')
    <p>Ingrese Informacion</p>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                {{-- With prepend slot --}}

                <x-adminlte-input name="name" label="Nombre y Apellido"  placeholder="Jose Perez"
                    label-class="text-lightblue" class="form-control" >
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>                            
                        </div>
                        
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input name="usuario" label="Usuario" placeholder="jose.perez" label-class="text-lightblue"
                    class="form-control">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas user-circle fa-user-circle  text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input name="ci" label="Carnet Identidad" placeholder="01234567890" label-class="text-lightblue"
                    class="form-control">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-address-book text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input name="addres" label="Direccion" placeholder="calle 3 esq A" label-class="text-lightblue"
                    class="form-control">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-address-card text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input name="email" label="Email" placeholder="username@example.com"
                    label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-at text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input name="password" label="Contraseña" placeholder="*********" label-class="text-lightblue"
                    class="form-control" type="password" class="form-control" id="inputPassword1" required autocomplete="new-password">
                    <x-slot name="prependSlot">
                        <div class="input-group-text ">
                            <i class="fas  fa-eye-slash  text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input name="password_confirmation" label="Confirmar Contraseña" placeholder="*********"
                    label-class="text-lightblue" class="visually-hidden" type="password" class="form-control"
                    id="inputPassword2" required autocomplete="new-password">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-eye-slash  text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save" />
            </div>
        </div>
    </form>


@stop
