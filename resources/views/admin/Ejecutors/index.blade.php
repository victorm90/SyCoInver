@extends('adminlte::page')
@section('title', 'Ejecutores')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <img src="/imagen/log.png" alt="">
        </div>
    </div>
    <form action="{{ route('admin.ejecutors.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row ">
                    <div class="col-md-8">
                        <div class="text-white bg-dark p-1 text-center ">Registro de Ejecutores</div>
                        <div class="p-3 border border-3 border-dark">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <x-adminlte-input name="name" label="Nombre Ejecutor" placeholder=" .... "
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
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <x-adminlte-input name="addres" label="Direccion" placeholder="...."
                                            disabled="disabled" id="addres" label-class="text-lightblue"
                                            class="form-control">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fa fa-address-card text-lightblue"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <x-adminlte-input name="telefono" id="telefono" label="Num Telefono"
                                            label-class="text-lightblue" placeholder="+53xxxxxx" disabled="disabled"
                                            type="number" igroup-size="" min=1 max=1099999999999999>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-dark"></div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <x-adminlte-input name="ncontrato" id="ncontrato" label="Num Contrato"
                                            label-class="text-lightblue" placeholder="No.0" disabled="disabled"
                                            type="number" igroup-size="" min=1 max=1099999999999999>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-dark"></div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="tipo_id" id="tipo_id" label="Tipo de Empresa"
                                            label-class="text-lightblue" title="Seleccione una Opcion"
                                            data-title="Select an option..." data-live-search
                                            data-live-search-placeholder="Search..." data-show-tick igroup-size="">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                            </x-slot>
                                            @foreach ($tipos as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="provincia_id" id="provincia_id" label="Provincia"
                                            label-class="text-lightblue" title="Seleccione una Opcion"
                                            data-title="Select an option..." data-live-search
                                            data-live-search-placeholder="Search..." data-show-tick igroup-size="">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                            </x-slot>
                                            @foreach ($provincias as $provincia)
                                                <option value="{{ $provincia->id }}">{{ $provincia->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="fecha" class="form-label text-lightblue ">Fecha de
                                            Contratación</label>
                                        <input type="date" name="fecha_cont" id="fecha_cont"
                                            class="form-control border-seccess" value="<?php echo date('Y-m-d'); ?>" igroup-size="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="fecha" class="form-label text-lightblue ">Fecha Vencimiento del
                                            Contrato</label>
                                        <input type="date" name="fecha_ven_cont" id="fecha_ven_cont"
                                            class="form-control border-seccess" value="<?php echo date('Y-m-d'); ?>"
                                            igroup-size="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <x-adminlte-input name="valor" id="valor" label="Valor Contratado"
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
                                            id="ejecutor_detalle" placeholder="Inserte una descripción...">
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
                        <div class="text-white bg-dark p-1 text-center">Servicios de Ejecutores</div>
                        <div class="p-3 border border-3 border-dark">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="servicio_id" label="Servicios"
                                            label-class="text-lightblue" title="Seleccione un Servicio"
                                            data-title="Select an option..." data-live-search
                                            data-live-search-placeholder="Search..." data-show-tick igroup-size="">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                            </x-slot>
                                            @foreach ($servicio as $ser)
                                                <option value="{{ $ser->id }}">{{ $ser->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                                <div class="col-lg-6">
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
                                <div class="col-lg-6">
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
                                                <th>Servicio</th>
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
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Total</th>
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
                                    ¿Está seguro de que desea eliminar todos los servicios de los ejecutores ...?
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
    <a>Listado de Ejecutores</a>
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
                    'Nombre del Ejecutor',
                    'No Contrato',
                    'Valor Contratado',
                    'Provincia',
                    'Remanente Contractual',
                    'Estado',
                    ['label' => 'Accion', 'no-export' => true, 'width' => 9],
                ];
                $btnEdit = '';
                $btnDelete = '';
                $btnDetails = '';
                $config = [];
            @endphp
            <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                bordered compressed>
                @foreach ($ejecutors as $ejecutor)
                    <tr>
                        <td>{{ $ejecutor->id }}</td>
                        <td>{{ $ejecutor->name }}</td>
                        <td>No. {{ $ejecutor->ncontrato }}</td>
                        {{-- <td>{{ $ejecutor->fecha_cont }}</td> --}}
                        <td> $ {{ $ejecutor->valorhidden }}</td>
                        {{-- <td>{{ $ejecutor->fecha_ven_cont }}</td> --}}
                        {{-- <td>{{ $ejecutor->telefono }}</td>
                        <td>{{ $ejecutor->addres }}</td> --}}
                        <td>{{ $ejecutor->provincia->name }}</td>
                        <td>
                            @if ($ejecutor->diasHastaVencimiento() <= 0)
                            <div class="alert alert-danger">
                                ¡Su Contrato está Vencido!
                            </div>
                                
                            @elseif ($ejecutor->diasHastaVencimiento() <=7)
                                
                                <div class="alert alert-warning">
                                    ¡Atención! El Contrato está próximo a vencer, le quedan {{ $ejecutor->dayoff }} días.
                                </div>
                            @else
                                {{ $ejecutor->dayoff }} días
                            @endif                           
                        </td>
                        <td>
                            @if ($ejecutor->estado == 1)
                                <span class="fw-bolder p-1 rounded bg-primary text-white">Activo</span>
                            @else()
                                <span class="fw-bolder p-1 rounded bg-danger text-white">Inactivo</span>
                            @endif()
                        </td>
                        <td>
                            {{-- @can('admin.tarjetas.edit') --}}
                            <a href="{{ route('admin.ejecutors.edit', $ejecutor) }}"class="btn btn-xs btn-default text-primary mx-1 shadow"
                                title="Editar"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                            @if ($ejecutor->estado == 1)
                                <a href="" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"
                                    data-toggle="modal" data-target="#modalPurple{{ $ejecutor->id }}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i></a>
                            @else()
                                <a href="" class="btn btn-xs btn-default text-warning mx-1 shadow"
                                    title="Restaurar" data-toggle="modal" data-target="#modalPurple{{ $ejecutor->id }}">
                                    <i class="fa fa-lg fa-fw fa-upload"></i></a>
                            @endif()

                            @if (Auth::user()->roles[0]->name == 'Admin')
                                <a href="{{ route('admin.ejecutors.show', $ejecutor) }}"
                                    class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
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
            document.getElementById("addres").disabled = false;
            document.getElementById("telefono").disabled = false;
            document.getElementById("ncontrato").disabled = false;
            document.getElementById("provincia_id").disabled = false;
            document.getElementById("fecha_cont").disabled = false;
            /* document.getElementById("valor").disabled = false; */
            document.getElementById("fecha_ven_cont").disabled = false;
            document.getElementById("ejecutor_detalle").disabled = false;
            document.getElementById("costo1").disabled = false;
            document.getElementById("costo2").disabled = false;
        }
    </script>

    <script>
        var fechaEmision = moment(document.getElementById('fecha_cont').value, 'YYYY/MM/DD');
        var fechaExpiracion = moment(document.getElementById('fecha_ven_cont').value, 'YYYY/MM/DD');
        var diasDiferencia = fechaExpiracion.diff(fechaEmision, 'diasDiferencia');
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
            let idservicio = $('#servicio_id').val();
            let nameservicio = $('#servicio_id option:selected').text();
            let costoMN = $('#costo1').val();
            let costoUSD = $('#costo2').val();

            //Validaciones
            //1.Para que los campos no esten vacíos
            if (nameservicio != '' && costoMN != '') {

                //2 Valores ingresados sean los correctos
                if (parseFloat(costoMN) > 0 && parseFloat(costoUSD) >= 0) {
                    //Calcular
                    SubTotal[cont] = parseFloat(costoMN) + parseFloat(costoUSD);
                    total += SubTotal[cont];


                    let fila = '<tr id="fila' + cont + '">' +
                        '<th>' + (cont + 1) + '</th>' +
                        '<td><input type="hidden" name="arrayidservicio[]" value="' + idservicio + '" >' + nameservicio +
                        '</td>' +
                        '<td><input type="hidden" name="arraycostoMN[]" value="' + costoMN + '" >' + costoMN + '</td>' +
                        '<td><input type="hidden" name="arraycostoUSD[]" value="' + costoUSD + '" >' + costoUSD + '</td>' +
                        '<td>' + SubTotal[cont] + '</td>' +
                        '<td><button class="btn btn-danger" type="button" onClick="eliminar(' + cont +
                        ');"><i class="fa fa-solid fa-trash"></i></button></td>' + '</tr>';

                    //Acciones despues de añadir la fila
                    $('#tabla_detalle').append(fila);
                    $('#valor').val(total);
                    $('#valorhidden').val(total);
                    limpiarCampos();
                    cont++;
                    disabledButtons();

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
            let select = $('#servicio_id');
            select.selectpicker();
            select.selectpicker('val', '');
            $('#costo1').val('');
            $('#costo2').val('0');

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
