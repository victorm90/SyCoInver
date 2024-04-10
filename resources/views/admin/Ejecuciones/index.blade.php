@extends('adminlte::page')
@section('title', 'Ejecuciones')

@section('plugins.BootstrapSelect', true)

@section('content_header')
    <div class="card">
        <div class="card-body">
            <img src="/imagen/log.png" alt="">
        </div>
    </div>
    <form action="{{ route('admin.ejecuciones.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row gy-8">
                    <div class="col-md-12">
                        <div class="text-white bg-dark p-1 text-center">EJECUCIONES</div>
                        <div class="p-3 border border-3 border-dark">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="entidade_id" label="Entidad"
                                            label-class="text-lightblue" title="Seleccione una Entidad"
                                            data-title="Select an option..." data-live-search
                                            data-live-search-placeholder="Search..." data-show-tick igroup-size="">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                            </x-slot>
                                            @foreach ($entidade as $entidad)
                                                <option value="{{ $entidad->id }}">{{ $entidad->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="instalacione_id" label="Instalacion"
                                            label-class="text-lightblue" title="Seleccione una Instalacion"
                                            data-title="Select an option..." data-live-search
                                            data-live-search-placeholder="Search..." data-show-tick igroup-size="">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                            </x-slot>
                                            @foreach ($instalacione as $instalacion)
                                                <option value="{{ $instalacion->id }}">{{ $instalacion->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="ejecutor_id" label="Ejecutor"
                                            label-class="text-lightblue" title="Seleccione un Ejecutor"
                                            data-title="Select an option..." data-live-search
                                            data-live-search-placeholder="Search..." data-show-tick igroup-size="">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                            </x-slot>
                                            @foreach ($ejecutor as $ejecuto)
                                                <option value="{{ $ejecuto->id }}">{{ $ejecuto->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="obra_id" label="Obras" label-class="text-lightblue"
                                            title="Seleccione una Obra" data-title="Select an option..." data-live-search
                                            data-live-search-placeholder="Search..." data-show-tick igroup-size="">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                            </x-slot>
                                            @foreach ($obras as $obra)
                                                <option value="{{ $obra->id }}">{{ $obra->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="gasto_id" label="Gastos" label-class="text-lightblue"
                                            title="Seleccione un Gasto" data-title="Select an option..." data-live-search
                                            data-live-search-placeholder="Search..." data-show-tick igroup-size="">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                            </x-slot>
                                            @foreach ($gastos as $gasto)
                                                <option value="{{ $gasto->id }}">{{ $gasto->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
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
                                            @foreach ($servicios as $servicio)
                                                <option value="{{ $servicio->id }}">{{ $servicio->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="fecha" class="form-label">Fecha </label>
                                        <input type="date" name="fecha" id="fecha"
                                            class="form-control border-seccess" value="<?php echo date('d-m-Y'); ?>"
                                            igroup-size="">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <x-adminlte-input name="nfactura" label="Numero de Factura"
                                            placeholder="numero factura" disabled="disabled" id="nfactura"
                                            type="number" igroup-size="" min=1 max=100000000 label-class="text-info">
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-dark">
                                                    {{-- <i class="fas fa-hashtag"></i> --}}
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                <div class="col-lg-2">
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
                                <div class="col-lg-2">
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
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <x-adminlte-input id="costototal" name="costototal" label="Costo Total"
                                            placeholder="costo total" disabled="disabled" type="decimal" igroup-size=""
                                            min=1 max=100000000 label-class="text-info">
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-dark">
                                                    {{-- <i class="fas fa-hashtag"></i> --}}
                                                </div>
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
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="table-responsive">
                                <table id="tabla_detalle" class="table table-hover">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>Servicio</th>
                                            <th>Fecha</th>
                                            <th>No.Factura</th>
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
                <div class="modal fade" id="modalPurple" tabindex="-1" role="dialog"
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
                                ¿Está seguro de que desea eliminar el detalle de Ejecucion ...?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger" id="btn_cancelar"
                                    data-dismiss="modal">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <div class=" col-md-2">
                        <a class="btn btn-outline-dark  btn-sm rounded center position-relative btn-sm fas fa-thumbs-up fa-lg"
                            icon="fas fa-save" title="Añada Nueva instalacion" onClick="activar()"
                            value="activar">Nuevo</a>
                        <button id="btn_cancelarok" class="btn-sm btn btn-outline-danger rounded center"
                            data-toggle="modal" data-target="#modalPurple" type="button">Cancelar</button>
                        <x-adminlte-button id="añadir" type="submit" label="Añadir" icon="fas fa-save"
                            class="btn-sm btn btn-outline-primary rounded center" />
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2">
                    <div class="form-group">
                        <div class="input-group date ">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" name="fi" id="fi"
                                class="form-control datepicker pull-right" placeholder="Desde">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" id="ff" name="ff"
                                class="form-control datepicker pull-right" placeholder="Hasta">
                        </div>
                    </div>
                </div>
            </div>
            @php
                $heads = ['ID', 'Entidad', 'Instalacion', 'Obra', 'Ejecutor', 'Gasto', 'Costo Total', ['label' => 'Accion', 'no-export' => true, 'width' => 6]];
                $btnEdit = '';
                $btnDelete = '<button type="submit" data-toggle="modal" data-target="#" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar"><i class="fa fa-lg fa-fw fa-trash"></i> </button>';
                $btnDetails = '';
                $config = [$btnDetails];

            @endphp
            <x-adminlte-datatable id="tabla1" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                with-buttons bordered compressed>
                @foreach ($ejecuciones as $ejecucion)
                    <tr>
                        <td>{{ $ejecucion->id }}</td>
                        <td>{{ $ejecucion->entidade->name }}</td>
                        <td>{{ $ejecucion->instalacione->name }}</td>
                        <td>{{ $ejecucion->obra->name }}</td>
                        <td>{{ $ejecucion->ejecutor->name }}</td>
                        <td>{{ $ejecucion->gasto->name }}</td>
                        {{-- <td>
                            @foreach ($ejecucion->servicio as $serv)
                                {{ $serv->name }}<br>
                            @endforeach
                        </td> --}}
                        <td>{{ $ejecucion->costototal }}</td>
                        {{-- <td>{{ $ejecucion->montototal }}</td> --}}
                        <td>
                            {{-- @if (Auth::user()->roles[0]->name == 'Operador' || Auth::user()->roles[0]->name == 'Admin')
                                <a href="{{ route('admin.ejecuciones.edit', $ejecucion) }}"class="btn btn-xs btn-default text-primary mx-1 shadow"
                                    title="Editar"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                            @endif --}}
                            @if (Auth::user()->roles[0]->name == 'Admin')
                                <a href="{{ route('admin.ejecuciones.show', $ejecucion) }}"
                                    class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                            @endif
                            @if (Auth::user()->roles[0]->name == 'Operador' || Auth::user()->roles[0]->name == 'Admin')
                                <a href="" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"
                                    data-toggle="modal" data-target="#modalPurple{{ $ejecucion->id }}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i></a>
                            @endif
                        </td>
                    </tr>
                    <div class="modal fade" id="modalPurple{{ $ejecucion->id }}" tabindex="-1" role="dialog"
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
                                    ¿Está seguro de que desea eliminar la ejecucion ...?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancelar</button>
                                    <form style="display:inline"
                                        action="{{ route('admin.ejecuciones.destroy', $ejecucion) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
    {{--  @foreach ($ejecuciones as $ejecucion)
        <x-adminlte-modal id="modalPurple2{{ $ejecucion->id }}" title="Detalle de Ejecuciones" size="lg" theme="teal" icon="fas fa-bell" v-centered static-backdrop scrollable>
            <div style="height:300px;">
                <div class="card">
                    <div class="card-body">
                        @php
                            $heads = ['ID', 'Instalacion', 'Servicio', 'Fecha', 'Costo CUP', 'Costo USD', 'Num Factura', []];
                        @endphp
                        <x-adminlte-datatable id="detalleprueba" :heads="$heads" head-theme="dark" bordered compressed>
                            <tr>
                                <td>{{ $ejecucion->id }}</td>
                                <td>{{ $ejecucion->instalacione->name }}</td>
                                <td>
                                    @foreach ($ejecucion->servicio as $serv)
                                        {{ $serv->name }}<br>
                                        <td>{{ $serv->pivot->fecha }}</td>
                                        <td>{{ $serv->pivot->nfactura }}</td>
                                        <td>{{ $serv->pivot->costomcu }}</td>
                                        <td>{{ $serv->pivot->costousd }}</td>
                                    @endforeach
                                </td>
                            </tr>
                        </x-adminlte-datatable>
                    </div>
                </div>
            </div>
            <x-slot name="footerSlot">
                
            </x-slot>
        </x-adminlte-modal>        
    @endforeach --}}
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
            document.getElementById("nfactura").disabled = false;
            document.getElementById("costototal").disabled = false;
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
                '<td></td>' +
                '</tr>';
            $('#tabla_detalle').append(fila);
            cont = 0;
            SubTotal = [];
            total = 0;
            $('#total').html("$: " + total);
            $('#inputTotal').val(total);
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
            let fecha = $('#fecha').val();
            let nfactura = $('#nfactura').val();
            let costoMN = $('#costo1').val();
            let costoUSD = $('#costo2').val();

            //Validaciones
            //1.Para que los campos no esten vacíos
            if (nameservicio != '' && fecha != '' && nfactura != '' && costoMN != '') {

                //2 Valores ingresados sean los correctos
                if (parseFloat(nfactura) > 0 && parseFloat(costoMN) > 0 && parseFloat(costoUSD) >= 0) {
                    //Calcular
                    SubTotal[cont] = parseFloat(costoMN) + parseFloat(costoUSD);
                    total += SubTotal[cont];


                    let fila = '<tr id="fila' + cont + '">' +
                        '<th>' + (cont + 1) + '</th>' +
                        '<td><input type="hidden" name="arrayidservicio[]" value="' + idservicio + '" >' + nameservicio +
                        '</td>' +
                        '<td><input type="hidden" name="arrayfecha[]" value="' + fecha + '" >' + fecha + '</td>' +
                        '<td><input type="hidden" name="arraynfactura[]" value="' + nfactura + '" >' + nfactura + '</td>' +
                        '<td><input type="hidden" name="arraycostoMN[]" value="' + costoMN + '" >' + costoMN + '</td>' +
                        '<td><input type="hidden" name="arraycostoUSD[]" value="' + costoUSD + '" >' + costoUSD + '</td>' +
                        '<td>' + SubTotal[cont] + '</td>' +
                        '<td><button class="btn btn-danger" type="button" onClick="eliminar(' + cont +
                        ');"><i class="fa fa-solid fa-trash"></i></button></td>' + '</tr>';

                    //Acciones despues de añadir la fila
                    $('#tabla_detalle').append(fila);
                    $('#costototal').val(total);
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
            $('#inputTotal').val(total);
            disabledButtons();
        }

        function limpiarCampos() {
            let select = $('#servicio_id');
            select.selectpicker();
            select.selectpicker('val', '');
            $('#fecha').val('');
            $('#nfactura').val('');
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
