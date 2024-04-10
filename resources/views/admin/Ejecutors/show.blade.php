@extends('adminlte::page')
@section('title', 'Ejecuciones Detalles')

@section('plugins.Sweetalert2', false)

@section('content_header')
    <div class="card">
        <div class="card-body">
            <img src="/imagen/log.png" alt="">
        </div>
    </div>
@stop

@section('content')    
    <div class="container w-150 border border-6 border-dark rounded p-5 mt-5">        
        <div class="card">            
            <div class="card-body">
                <div class="row gy-12">
                    <div class="col-md-12">
                        <div class="row mb-6">
                            <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fas fa-building"></i></span>
                                    <input disabled type="text" class="form-control" value="Ejecutor : ">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <input disabled type="text" class="form-control" value="{{ $ejecutor->name}}">
                            </div>
                        </div>

                        <div class="row mb-6">
                            <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fas fa-edit"></i></span>
                                    <input disabled type="text" class="form-control" value="No Contrato : ">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <input disabled type="text" class="form-control"
                                    value=" No. {{ $ejecutor->ncontrato }}">

                            </div>
                        </div>

                        <div class="row mb-6">
                            <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fas fa-city"></i></span>
                                    <input disabled type="text" class="form-control" value="Fecha Contratado : ">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <input disabled type="text" class="form-control" value="{{ date('d-m-Y', strtotime($ejecutor->fecha_cont)) }}">
                            </div>
                        </div>

                        <div class="row mb-6">
                            <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fas fa-hand-holding-usd"></i></span>
                                    <input disabled type="text" class="form-control" value="Valor Contratado : ">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <input disabled type="text" class="form-control" value="{{ $ejecutor->valorhidden  }}">
                            </div>
                        </div>

                        <div class="row mb-6">
                            <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fas far fa-bell"></i></span>
                                    <input disabled type="text" class="form-control" value="Fecha de Vencimiento del Contrato : ">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <input disabled type="text" class="form-control" value="{{ date('d-m-Y', strtotime($ejecutor->fecha_ven_cont)) }}">
                            </div>
                        </div>

                        <div class="row mb-6">
                            <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fas far fa-id-badge"></i></span>
                                    <input disabled type="text" class="form-control" value="Telefono : ">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <input disabled type="text" class="form-control" value="{{ $ejecutor->telefono}}">
                            </div>
                        </div>

                        <div class="row mb-6">
                            <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fas far fa-id-card"></i></span>
                                    <input disabled type="text" class="form-control" value="Direccion: ">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <input disabled type="text" class="form-control" value="{{$ejecutor->addres}}">
                            </div>
                        </div>

                        <div class="row mb-6">
                            <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fas fas fa-user-cog"></i></span>
                                    <input disabled type="text" class="form-control" value="Provincia : ">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <input disabled type="text" class="form-control" value="{{$ejecutor->provincia->name }}">
                            </div>
                        </div>

                        <div class="row mb-6">
                            <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fas fas fa-user-cog"></i></span>
                                    <input disabled type="text" class="form-control" value="Tipo de Empresa : ">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <input disabled type="text" class="form-control" value="{{$ejecutor->tipo->name }}">
                            </div>
                        </div>

                        <div class="card md-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabla de detalles de la ejecucion
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-striped">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>Servicio</th>                                            
                                            <th>CostoMN</th>
                                            <th>CostoUSD</th>
                                            <th>SubTotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ejecutor->servicio as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->name }}
                                                </td>                                                
                                                <td>
                                                    {{ $item->pivot->costomcu }}
                                                </td>
                                                <td>
                                                    {{ $item->pivot->costousd }}
                                                </td>
                                                <td class="td_subtotal">
                                                    {{ $item->pivot->costousd + $item->pivot->costomcu }}
                                                </td>
                                                <th></th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="6"></th>
                                        </tr>
                                        <tr>
                                            <th>Total</th>                                            
                                            <th></th>
                                            <th></th>
                                            <th id="th_total"></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2024</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Acceso a la Pagina Principal",
            showConfirmButton: false,
            timer: 1100
        });
    </script>

    <script>
        let filaSubtotal = document.getElementsByClassName('td_subtotal');
        let cont = 0;

        $(document).ready(function() {
            calcularValores();
        });

        function calcularValores() {
            for (let i = 0; i < filaSubtotal.length; i++) {
                cont += parseFloat(filaSubtotal[i].innerHTML);
            }

            $('#th_total').html(cont);
        }
    </script>
@stop
