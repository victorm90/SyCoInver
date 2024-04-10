@extends('adminlte::page')
@section('title', 'Obras')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <img src="/imagen/log.png" alt="">
        </div>
    </div>
    <form action="{{ route('admin.obras.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row ">
                    <div class="col-md-8">
                        <div class="text-white bg-dark p-1 text-center ">Registro de Obras</div>
                        <div class="p-3 border border-3 border-dark">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-adminlte-input name="name" label="Nombre de la Obra" placeholder=" .... "
                                            disabled="disabled" id="name" label-class="text-lightblue"
                                            class="form-control">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user text-lightblue"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="instalacione_id" id="instalacione_id"
                                            label="Instalacion" label-class="text-lightblue" title="Seleccione una Opcion"
                                            data-title="Select an option..." data-live-search
                                            data-live-search-placeholder="Search..." data-show-tick igroup-size="">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                            </x-slot>
                                            @foreach ($instalacion as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="tipobra_id" id="tipobra_id" label="Tipo de Obra"
                                            label-class="text-lightblue" title="Seleccione una Opcion"
                                            data-title="Select an option..." data-live-search
                                            data-live-search-placeholder="Search..." data-show-tick igroup-size="">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                            </x-slot>
                                            @foreach ($tipobra as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="importadore_id" id="importadore_id" label="Importador"
                                            label-class="text-lightblue" title="Seleccione una Opcion"
                                            data-title="Select an option..." data-live-search
                                            data-live-search-placeholder="Search..." data-show-tick igroup-size="">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                            </x-slot>
                                            @foreach ($importadore as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="organismo_id" id="organismo_id" label="Organismo"
                                            label-class="text-lightblue" title="Seleccione una Opcion"
                                            data-title="Select an option..." data-live-search
                                            data-live-search-placeholder="Search..." data-show-tick igroup-size="">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                            </x-slot>
                                            @foreach ($organismo as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="codigoinversiones_id" id="codigoinversiones_id"
                                            label="Codigo Inversion" label-class="text-lightblue"
                                            title="Seleccione una Opcion" data-title="Select an option..." data-live-search
                                            data-live-search-placeholder="Search..." data-show-tick igroup-size="">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                            </x-slot>
                                            @foreach ($codigoinversiones as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <x-adminlte-input name="valorplan" id="valorplan" label="Plan Asignado"
                                            label-class="text-lightblue" placeholder="$0.00" disabled="disabled"
                                            type="numer" igroup-size="" min=1 max=1099999999999999>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-dark"></div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <x-adminlte-input name="valor" id="valor" label="Valor Desagregado"
                                            label-class="text-lightblue" placeholder="$0.00" disabled="disabled"
                                            type="numer" igroup-size="" min=1 max=1099999999999999>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-dark"></div>
                                            </x-slot>
                                        </x-adminlte-input>
                                        <x-adminlte-input name="valorhidden" id="valorhidden"
                                            label-class="text-lightblue" placeholder="$0.00" type="hidden"
                                            igroup-size="" min=1 max=1099999999999999>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <x-adminlte-textarea name="detalle" label="Descripcion" rows=5
                                            label-class="text-lightblue" disabled="disabled" igroup-size="sm"
                                            id="detalle" placeholder="Inserte una descripción...">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-dark">
                                                    <i class="fas fa-lg fa-file-alt text-warning"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-white bg-dark p-1 text-center">Ejecuciones de Obras Planificadas</div>
                        <div class="p-3 border border-3 border-dark">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="ejecutore_id" label="Ejecutor"
                                            label-class="text-lightblue" title="Seleccione un Servicio"
                                            data-title="Select an option..." data-live-search
                                            data-live-search-placeholder="Search..." data-show-tick igroup-size="">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                            </x-slot>
                                            @foreach ($ejecutor as $ser)
                                                <option value="{{ $ser->id }}">{{ $ser->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="fecha" class="form-label">Fecha </label>
                                        <input type="date" name="fecha" id="fecha"
                                            class="form-control border-seccess" value="<?php echo date('d-m-Y'); ?>"
                                            igroup-size="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <x-adminlte-input name="costo1" id="costo1" label="CostoMN"
                                            placeholder="Costo" disabled="disabled" type="number" igroup-size="" min=1
                                            max=1099999999999999>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-dark"></div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <x-adminlte-input name="costo2" id="costo2" label="CostoUSD"
                                            placeholder="Costo" value="0" disabled="disabled" type="number"
                                            igroup-size="" min=1 max=1099999999999999>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-dark"></div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-2 ">
                                    <div class="form-group">
                                        <button id="btn_agregar"
                                            class="btn btn-outline-dark  btn-sm rounded center position-relative btn-sm fas  fa-lg"
                                            type="button">Agregar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-0">
                                <div class="table-responsive">
                                    <table id="tabla_detalle" class="table table-hover">
                                        <thead class="bg-dark text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Ejecutor</th>
                                                <th>Fecha</th>
                                                <th>CostoMN</th>
                                                <th>CostoUSD</th>
                                                <th>SubTotal</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Total</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th><input type="hidden" name="total" value="0"
                                                        id="inputTotal"><span id="total">0</span></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modalPur" tabindex="-1" role="dialog"
                        aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteModa">Confirmar eliminación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ¿Está seguro de que desea eliminar todo ...?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger" id="btn_cancelar"
                                        data-dismiss="modal">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div>
                            {{-- @if (Auth::user()->roles[0]->name == 'Operador' || Auth::user()->roles[0]->name == 'Admin') --}}
                            <a class="btn btn-outline-dark  btn-sm rounded center position-relative btn-sm fas fa-thumbs-up fa-lg"
                                icon="fas fa-save" title="Añada Nueva instalacion" onClick="activar()"
                                value="activar">Nuevo</a>
                            <button id="btn_cancelarok" class="btn-sm btn btn-outline-danger rounded center"
                                data-toggle="modal" data-target="#modalPur" type="button">Cancelar</button>
                            <x-adminlte-button id="añadir" type="submit" label="Añadir" icon="fas fa-save"
                                class="btn-sm btn btn-outline-primary rounded center" />
                            {{-- @endif --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
@stop

@section('content')
    <a>Listado de Obras</a>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            @php
                $heads = [
                    'ID',
                    'Obra',
                    'Instalacion',
                    'Valor Obra',                    
                    ['label' => 'Accion', 'no-export' => true, 'width' => 9],
                ];
                $btnEdit = '';
                $btnDelete = '';
                $btnDetails = '';
                $config = [];
            @endphp
            <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                bordered compressed>
                @foreach ($obras as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->instalacion->name }}</td> 
                        <td>{{ $item->valorplan }}</td>                         
                        <td>
                            @if (Auth::user()->roles[0]->name == 'Operador' || Auth::user()->roles[0]->name == 'Admin')
                                    <a href=""class="btn btn-xs btn-default text-primary mx-1 shadow" data-toggle="modal" data-target="#editModal{{ $item->id }}"
                                        title="Editar"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                                        @include('admin.obras.edit')
                                @endif
                                @if (Auth::user()->roles[0]->name == 'Admin')
                                <a href="" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalPurple{{$item->id}}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i></a>
                                    @include('admin.obras.delete')
                                @endif
                        </td>
                    </tr>
                    <div class="modal fade" id="modalPurple{{ $ejecutor->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteModal">Confirmar eliminación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{ $ejecutor->estado == 1 ? '¿Está seguro de que desea Inhabilitar el ejecutor ?' : '¿Está seguro de que desea Habilitar el ejecutor ?' }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancelar</button>
                                    <form style="display:inline"
                                        action="{{ route('admin.ejecutors.destroy', $ejecutor) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Confirmar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </x-adminlte-datatable>

        </div>
    </div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"
        integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA=="
        crossorigin="anonymous"></script>

@stop

@section('js')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css"
        integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg=="
        crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>


    <script>
        function activar() {
            document.getElementById("name").disabled = false;            
            document.getElementById("valorplan").disabled = false;
            document.getElementById("detalle").disabled = false;
            document.getElementById("costo1").disabled = false;
            document.getElementById("costo2").disabled = false;
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#btn_agregar').click(function() {
                agregar();
            });

            $('#btn_cancelar').click(function() {
                eliminartodo();
            });

            disabledButtons();

        });
        //Variables
        let cont = 0;
        let SubTotal = [];
        let total = 0;

        function eliminartodo() {
            $('#tabla_detalle > tbody').empty();
            let fila = '<tr>' +
                '<th></th>' +
                '<th></th>' +
                '<td></td>' +
                '<td></td>' +
                '<td></td>' +
                '<td></td>' +
                '<td></td>' +
                '</tr>';
            $('#tabla_detalle').append(fila);
            cont = 0;
            SubTotal = [];
            total = 0;
            $('#total').html("$: " + total);
            $('#valor').val(total);
            limpiarCampos();
            disabledButtons();
        }

        function disabledButtons() {
            if (total == 0) {
                $('#btn_cancelar').hide();
                $('#btn_cancelarok').hide();
                $('#añadir').hide();
            } else {
                $('#btn_cancelar').show();
                $('#btn_cancelarok').show();
                $('#añadir').show();
            }
        }

        function agregar() {
            //Obtener valores de los campos
            let idejecutore = $('#ejecutore_id').val();
            let nameejecutor = $('#ejecutore_id option:selected').text();
            let fecha = $('#fecha').val();
            let costoMN = $('#costo1').val();
            let costoUSD = $('#costo2').val();

            //Validaciones
            //1.Para que los campos no esten vacíos
            if (nameejecutor != '' && fecha != '' && costoMN != '') {

                //2 Valores ingresados sean los correctos
                if (parseFloat(costoMN) > 0 && parseFloat(costoUSD) >= 0) {
                    //Calcular
                    SubTotal[cont] = parseFloat(costoMN) + parseFloat(costoUSD);
                    total += SubTotal[cont];


                    let fila = '<tr id="fila' + cont + '">' +
                        '<th>' + (cont + 1) + '</th>' +
                        '<td><input type="hidden" name="arrayidejecutore[]" value="' + idejecutore + '" >' + nameejecutor +
                        '</td>' +
                        '<td><input type="hidden" name="arrayfecha[]" value="' + fecha + '" >' + fecha + '</td>' +
                        '<td><input type="hidden" name="arraycostoMN[]" value="' + costoMN + '" >' + costoMN + '</td>' +
                        '<td><input type="hidden" name="arraycostoUSD[]" value="' + costoUSD + '" >' + costoUSD + '</td>' +
                        '<td>' + SubTotal[cont] + '</td>' +
                        '<td><button class="btn btn-danger" type="button" onClick="eliminar(' + cont +
                        ');"><i class="fa fa-solid fa-trash"></i></button></td>' + '</tr>';

                    //Acciones despues de añadir la fila
                    $('#tabla_detalle').append(fila);
                    $('#valor').val(total);
                    $('#valorhidden').val(total);

                    // Se debe obtener el valor numérico de los elementos para la comparación
                    var valor = parseFloat($('#valor').val());
                    var valorplan = parseFloat($('#valorplan').val());

                    if (valor < valorplan) {
                        limpiarCampos();
                        cont++;
                        disabledButtons();                        
                    } else {
                        showModal('El plan desagregado es mayor que el plan asignado');
                    }
                    //Mostrar Campos   
                    $('#total').html("$: " + total);
                } else {
                    showModal('Valores Incorrectos')
                }
            } else {
                showModal('le faltan campos por llenar')
            }
        }

        function eliminar(index) {

            total -= SubTotal[index];
            //Mostrar Campos   
            $('#total').html("$: " + total);
            //Eliminar la fila de la Tabla
            $('#fila' + index).remove();
            $('#valor').val(total);
            disabledButtons();
        }

        function limpiarCampos() {
            let select = $('#ejecutore_id');
            select.selectpicker();
            select.selectpicker('val', '');
            $('#fecha').val('');
            $('#costo1').val('');
            $('#costo2').val('');

            disabledButtons();
        }

        function showModal(message, icon = "error") {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: icon,
                title: message
            });
        }
    </script>
@stop
