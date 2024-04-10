@extends('adminlte::page')
@section('title', 'Instalaciones')


@section('content_header')
    <h1>Ingrese los Datos para crear una nueva instalacion</h1>
    <div>
       
    </div>
       
@stop

@section('content')    
    <form action="{{ route('admin.instalaciones.store') }}" method="POST">
        @csrf        
        <div class="card">
            <div class="card-body">
                <div class="row gy-8">
                    <div class="col-md-8">
                        <div class="text-white bg-dark p-1 text-center">
                            DESAGREGACIONES
                        </div>
                        <div class="p-3 border border-3 border-dark">
                            <div class="row">
                                <div class="col-lg-6">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="ejecutor_id" label="Ejecutor" label-class="text-lightblue" title="Seleccione una Opcion"
                                         data-title="Select an option..." data-live-search data-live-search-placeholder="Search..." data-show-tick igroup-size="">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                            </x-slot>
                                            @foreach ($ejecutors as $ejecutor)
                                                <option value="{{ $ejecutor->id }}">{{ $ejecutor->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                                <div class="col-lg-6">
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
                                        <x-adminlte-select-bs id="servicio_id" name="servicio_id[]" label="Servicios" label-class="text-info" 
                                            igroup-size="" :config="$config" multiple>
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-gradient-info">
                                                    <i class="fas fa-tag"></i>
                                                </div>
                                            </x-slot>
                                            <x-slot name="appendSlot">
                                                {{-- <x-adminlte-button theme="outline-dark" label="Clear"
                                                icon="fas fa-lg fa-ban text-danger" /> --}}
                                            </x-slot>
                                            @foreach ($servicios as $servicio)
                                                <option value="{{ $servicio->id }}">{{ $servicio->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="fecha" class="form-label">Fecha </label>
                                        <input type="date" name="fecha" id="fecha" class="form-control border-seccess" 
                                        value="<?php echo date('Y-m-d'); ?>" igroup-size="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <x-adminlte-input name="costo1" id="costo1" label="CostoMN" placeholder="Costo" disabled="disabled"
                                            type="number" igroup-size="" min=1 max=1099999999999999>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-dark"></div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <x-adminlte-input name="costo2" id="costo2" label="CostoUSD" placeholder="Costo" disabled="disabled"
                                            type="number" igroup-size="" min=1 max=1099999999999999>
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
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="tabla_detalle" class="table table-hover">
                                        <thead class="bg-dark text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Instalacion</th>
                                                <th>Ejecutor</th>
                                                <th>Servicios</th>
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
                                                <th></th>
                                                <th><span id="total">0</span></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-12 mb-2">
                                <button id="btn_cancelar" class="btn-sm btn btn-outline-dark rounded center" type="button" data-toggle="modal" 
                                data-target="#exampleModal">Cancelar</button>                                
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="text-white bg-dark p-1 text-center">Ejecuciones</div>
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
                                            @foreach ($entidades as $entidade)
                                                <option value="{{ $entidade->id }}">{{ $entidade->name }}</option>
                                            @endforeach
                                        </x-adminlte-select-bs>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <x-adminlte-input type="text" name="name" label="Instalacion"
                                            label-class="text-lightblue" disabled="disabled" id="name"
                                            igroup-size="">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-car text-lightblue car-sport-outline"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <x-adminlte-select-bs name="obra_id" label="Obras" label-class="text-lightblue"
                                            title="Seleccione una Opcion" data-title="Select an option..." data-live-search
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
                                <div class="col-lg-12">
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
                                        <x-adminlte-input name="nfactura" label="Numero de Factura"
                                            placeholder="numero factura" disabled="disabled" id="nfactura"
                                            type="number" igroup-size="" min=1 max=100000000 label-class="text-info">
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-dark">
                                                    <i class="fas fa-hashtag"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <x-adminlte-input name="costototal" label="Costo Total" placeholder="numero factura" disabled="disabled" id="costototal"
                                            type="number" igroup-size="" min=1 max=100000000 label-class="text-info">
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-dark">
                                                    <i class="fas fa-hashtag"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                <a class="btn btn-outline-dark  btn-sm rounded center position-relative float-right btn-sm fas fa-thumbs-up fa-lg" icon="fas fa-save" 
                                    title="Añada Nueva instalacion" onClick="activar()" value="activar">Nuevo</a>
                                <x-adminlte-button type="submit" label="Añadir" icon="fas fa-save" class="btn-sm btn btn-outline-dark rounded center" />
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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <script>
        function activar() {
            document.getElementById("name").disabled = false;
            document.getElementById("nfactura").disabled = false;
            document.getElementById("costototal").disabled = false;
            document.getElementById("costo1").disabled = false;
            document.getElementById("costo2").disabled = false;
            document.getElementById("fecha").disabled = false;
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
            let idejecutor = $('#ejecutor_id').val();
            let name = $('#name').val();
            let namejecutor = $('#ejecutor_id option:selected').text();
            let nameservicio = $('#servicio_id option:selected').text();
            let fecha = $('#fecha').val();
            let costoMN = $('#costo1').val();
            let costoUSD = $('#costo2').val();

            //Validaciones
            //1.Para que los campos no esten vacíos
            if (namejecutor != '' && nameservicio != '' && fecha != '' && costoMN != '') {

                //2 Valores ingresados sean los correctos
                if (parseFloat(costoMN) > 0 && parseFloat(costoUSD) >= 0) {
                    //Calcular
                    SubTotal[cont] = parseFloat(costoMN) + parseFloat(costoUSD);
                    total += SubTotal[cont];


                    let fila = '<tr id="fila' + cont + '">' +
                        '<th>' + (cont + 1) + '</th>' +
                        '<td><input type="hidden" name="arrayidentidad[]" value="' + name + '" >' + name + '</td>' +
                        '<td><input type="hidden" name="arrayidejecutor[]" value="' + idejecutor + '" >' + namejecutor + '</td>' +
                        '<td><input type="hidden" name="arrayidservicio[]" value="' + nameservicio + '" >' + nameservicio + '</td>' +
                        '<td><input type="hidden" name="arrayfecha[]" value="' + fecha + '" >' + fecha + '</td>' +
                        '<td><input type="hidden" name="arraycostoMN[]" value="' + costoMN + '" >' + costoMN + '</td>' +
                        '<td><input type="hidden" name="arraycostoUSD[]" value="' + costoUSD + '" >' + costoUSD + '</td>' +
                        '<td>' + SubTotal[cont] + '</td>' +
                        '<td><button class="btn btn-danger" type="button" onClick="eliminar(' + cont + ');"><i class="fa fa-solid fa-trash"></i></button></td>' +
                        '</tr>';

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

            disabledButtons();
        }

        function limpiarCampos() {            
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

