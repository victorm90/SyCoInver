@extends('adminlte::page')
@section('title', 'Instalaciones')


@section('content_header')
    <h1>Editar Datos de Instalaciones</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($instalacione, ['route' => ['admin.instalaciones.update', $instalacione], 'method' => 'PUT']) !!}

            
            <div class="form-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                {!! Form::label('name', 'Nombre de la Instalacion:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la Entidad']) !!}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                {!! Form::label('cadena_id','cadena:') !!}
                {!! Form::select('cadena_id',$cadenas, null, ['class'=>'form-control']) !!}                
                @error('cadena_id')
                 <span class="text-danger">{{$message}}</span>                        
                @enderror
            </div> 
            <div class="form-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                {!! Form::label('municipio_id','municipios') !!}
                {!! Form::select('municipio_id',$municipios, null, ['class'=>'form-control']) !!}                
                @error('municipio_id')
                 <span class="text-danger">{{$message}}</span>                        
                @enderror
            </div> 
            <div class="form-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                {!! Form::label('detalle', 'Detalle de la Instalacion:') !!}
                {!! Form::text('detalle', null, ['class' => 'form-control', 'placeholder' => 'Detalle']) !!}
                @error('detalle')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            

            <div class="card-footer">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

    <script>
        function activar() {
            document.getElementById("name").disabled = false;
            document.getElementById("nfactura").disabled = false;
            /* document.getElementById("entidade_id").disabled = false;
            document.getElementById("obra_id").disabled = false;
            document.getElementById("ejecutor_id").disabled = false;
            document.getElementById("servicio_id").disabled = true;
            document.getElementById("gasto_id").disabled = false; */
        }
    </script>
@stop