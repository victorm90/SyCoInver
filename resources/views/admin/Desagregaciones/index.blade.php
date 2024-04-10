@extends('adminlte::page')
@section('title', 'Desagregaciones')

@section('plugins.Sweetalert2', true)

@section('content_header')

@stop

@section('content')
    <p class="text-center">Ingrese Informacion</p>
    <form action="" method="post">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-white bg-dark p-1 text-center">
                            DESAGREGACIONES
                        </div>
                        <div class="p-3 border border-3 border-dark">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="instalacione_id" label="Instalaciones"
                                            label-class="text-lightblue" title="Seleccione una Instalacion"
                                            data-title="Select an option..." data-live-search
                                            data-live-search-placeholder="Search..." data-show-tick igroup-size="">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                            </x-slot>
                                            @foreach ($instalaciones as $instalacion)
                                                <option value="{{ $instalacion->id }}">{{ $instalacion->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="fecha" class="form-label">Fecha </label>
                                        <input type="date" name="fecha" id="fecha"
                                            class="form-control border-seccess" value="<?php echo date('Y-m-d'); ?>" igroup-size="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <x-adminlte-input name="costo1" id="costo1" label="CostoMN" placeholder="Costo"
                                            type="number" igroup-size="sm" min=1 max=1099999999999999>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-dark"></div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <x-adminlte-input name="costo2" id="costo2" label="CostoUSD" placeholder="Costo"
                                            type="number" igroup-size="sm" min=1 max=1099999999999999>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-dark"></div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-4">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="desagregaciones" id="desagregacion"
                                            label="Desagregaciones" label-class="text-lightblue"
                                            title="Seleccione una Opcion" data-title="Select an option..." data-live-search
                                            data-live-search-placeholder="Search..." data-show-tick igroup-size="sm">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                            </x-slot>
                                            <option>MCUP</option>
                                            <option>MUSD</option>
                                            <option>IMPORTACION</option>
                                        </x-adminlte-select-bs>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-md-12 mb-2 ">
                                <button id="btn_agregar" class="btn btn-dark" type="button">Agregar</button>
                            </div>

                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="tabla_detalle" class="table table-hover">
                                        <thead class="bg-dark text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Entidad</th>
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
                                                <th></th>
                                                <th>Total</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th><span id="total">0</span></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-12 mb-2">
                                <button id="btn_cancelar" class="btn-sm btn btn-outline-dark rounded center" type="button" data-toggle="modal" data-target="#exampleModal">Cancelar</button>
                                <x-adminlte-button type="submit" label="Añadir" icon="fas fa-save" class="btn-sm btn btn-outline-dark rounded center" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal de confirmacion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Seguro que quieres cancelar la desagragacion...?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button id="btn_confirmar" type="button" class="btn btn-danger"
                            data-dismiss="modal">Confirmar</button>
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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <script>
        function activar() {
            document.getElementById("name").disabled = false;
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#btn_agregar').click(function() {
                agregar();
            });

            $('#btn_confirmar').click(function() {
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
            limpiarCampos();
            disabledButtons();
        }

        function disabledButtons() {
            if (total == 0) {
                $('#btn_cancelar').hide();
            } else {
                $('#btn_cancelar').show();
            }

        }

        function agregar() {
            //Obtener valores de los campos
            let idInstalacione = $('#instalacione_id').val();
            let nameInstalacione = $('#instalacione_id option:selected').text();
            let fecha = $('#fecha').val();
            let costoMN = $('#costo1').val();
            let costoUSD = $('#costo2').val();

            //Validaciones
            //1.Para que los campos no esten vacíos
            if (nameInstalacione != '' && fecha != '' && costoMN != '') {

                //2 Valores ingresados sean los correctos
                if (parseFloat(costoMN) > 0 && parseFloat(costoUSD) >= 0) {
                    //Calcular
                    SubTotal[cont] = parseFloat(costoMN) + parseFloat(costoUSD);
                    total += SubTotal[cont];


                    let fila = '<tr id="fila' + cont + '">' +
                        '<th>' + (cont + 1) + '</th>' +
                        '<td><input type="hidden" name="arrayidentidad[]" value="' + idInstalacione + '" >' + nameInstalacione + '</td>' +
                        '<td><input type="hidden" name="arrayfecha[]" value="' + fecha + '" >' + fecha + '</td>' +
                        '<td><input type="hidden" name="arraycostoMN[]" value="' + costoMN + '" >' + costoMN + '</td>' +
                        '<td><input type="hidden" name="arraycostoUSD[]" value="' + costoUSD + '" >' + costoUSD + '</td>' +
                        '<td>' + SubTotal[cont] + '</td>' +
                        '<td><button class="btn btn-danger" type="button" onClick="eliminar(' + cont + ');"><i class="fa fa-solid fa-trash"></i></button></td>' +
                        '</tr>';

                    //Acciones despues de añadir la fila
                    $('#tabla_detalle').append(fila);
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

            disabledButtons();
        }

        function limpiarCampos() {
            let select = $('#instalacione_id');
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
