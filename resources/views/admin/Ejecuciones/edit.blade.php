@extends('adminlte::page')
@section('title', 'Ejecuciones')

@section('plugins.BootstrapSelect', true)

@section('content_header')
    <div class="card">
        <div class="card-body">
            <img src="/imagen/log.png" alt="">
        </div>
    </div>
    <form action="{{ route('admin.ejecuciones.update', $ejecucione) }}" method="PUT">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row gy-8">
                    <div class="col-md-7">
                        <div class="text-white bg-dark p-1 text-center">
                            DATALLE DE EJECUCION
                        </div>
                        <div class="p-3 border border-3 border-dark">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        @php
                                            $config = [
                                                'title' => 'Seleccione los servicios...',
                                                'liveSearch' => true,
                                                'liveSearchPlaceholder' => 'Buscar...',
                                                'showTick' => true,
                                                'actionsBox' => true,
                                            ];
                                        @endphp
                                        <x-adminlte-select-bs id="servicio_id" name="servicio_id[]" label="Servicios"
                                            label-class="text-info" igroup-size="" :config="$config" multiple>
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-tag"></i>
                                                </div>
                                            </x-slot>
                                            <x-slot name="appendSlot">                                             
                                            </x-slot>
                                            @foreach ($servicios as $servicio)
                                                <option value="{{ $servicio->id }}">{{ $servicio->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <x-adminlte-input name="nfactura" label="Numero de Factura"
                                            placeholder="numero factura" disabled="disabled" id="nfactura" type="number"
                                            igroup-size="" min=1 max=100000000 label-class="text-info">
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-dark">
                                                    {{-- <i class="fas fa-hashtag"></i> --}}
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="fecha" class="form-label">Fecha </label>
                                        <input type="date" name="fecha" id="fecha"
                                            class="form-control border-seccess" value="<?php echo date('Y-m-d'); ?>" igroup-size="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <x-adminlte-input name="costo1" id="costo1" label="CostoMN" placeholder="Costo"
                                            disabled="disabled" type="number" igroup-size="" min=1 max=1099999999999999>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-dark"></div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <x-adminlte-input name="costo2" id="costo2" label="CostoUSD" placeholder="Costo"
                                            disabled="disabled" type="number" igroup-size="" min=1 max=1099999999999999>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-dark"></div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2 ">
                                <button id="btn_agregar" class="btn btn-dark" type="button">Agregar</button>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="table-responsive">
                                    <table id="tabla_detalle" class="table table-hover">
                                        <thead class="bg-dark text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Servicio</th>
                                                <th>Fecha</th>
                                                <th>Num Factura</th>
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

                            <div class="col-md-12 mb-2">
                                <button id="btn_cancelarok" class="btn-sm btn btn-outline-dark rounded center"
                                    data-toggle="modal" data-target="#modalPurple" type="button">Cancelar</button>
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
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger" id="btn_cancelar"
                                        data-dismiss="modal">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="text-white bg-dark p-1 text-center">EJECUCIONES</div>
                        <div class="p-3 border border-3 border-dark">
                            <div class="row">
                                <div class="col-lg-12">
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
                                <div class="col-lg-12">
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
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="ejecutor_id" label="Ejecutor"
                                            label-class="text-lightblue" title="Seleccione una Opcion"
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
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="obra_id" label="Obras" label-class="text-lightblue"
                                            title="Seleccione una Opcion" data-title="Select an option..."
                                            data-live-search data-live-search-placeholder="Search..." data-show-tick
                                            igroup-size="">
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
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="gasto_id" label="Gastos" label-class="text-lightblue"
                                            title="Seleccione una Opcion" data-title="Select an option..."
                                            data-live-search data-live-search-placeholder="Search..." data-show-tick
                                            igroup-size="">
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
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <x-adminlte-input id="costototal" name="costototal" label="Costo Total"
                                            placeholder="numero factura" disabled="disabled" type="decimal"
                                            igroup-size="" min=1 max=100000000 label-class="text-info">
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-dark">
                                                    <i class="fas fa-hashtag"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                <a class="btn btn-outline-dark  btn-sm rounded center position-relative float-right btn-sm fas fa-thumbs-up fa-lg"
                                    icon="fas fa-save" title="Añada Nueva instalacion" onClick="activar()"
                                    value="activar">Nuevo</a>
                                <x-adminlte-button id="añadir" type="submit" label="Añadir" icon="fas fa-save"
                                    class="btn-sm btn btn-outline-dark rounded center" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
            $('#detalle').DataTable({
                "retrieve": true,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": $("#detalle").data("source")
                },
                "columns": [{
                        "data": "id"
                    },
                    {
                        "data": "name"
                    },
                ],
                responsive: true
            });            
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#btn_agregar').click(function() {
                agregar();
            });

            $('#btn_cancelar').click(function() {
                eliminartodo();
            });

            $('#costototal').val(total);

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
                if (parseFloat(costoMN) > 0 && parseFloat(costoUSD) >= 0 && parseFloat(nfactura) > 0) {
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
            $('#costototal').val(total);
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