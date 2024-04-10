@extends('adminlte::page')
@section('title', 'Admin')

@section('plugins.Sweetalert2', true)

@section('content_header')

@stop


@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="">Dashboard</h1>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$users_count}}</h3>
                            <p>Usuarios Registrados</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('admin.users.index')}}" class="small-box-footer">Mas Información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$instalacione}}<sup style="font-size: 20px"></sup></h3>
                            <p>Instalaciones</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('admin.instalaciones.index')}}" class="small-box-footer">Mas Información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$obras}}</h3>
                            <p>Cantidad de Obras</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('admin.obras.index')}}" class="small-box-footer">Mas Información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$ejecutore}}</h3>
                            <p>Cantidad de Ejecutores</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ route('admin.ejecutors.index')}}" class="small-box-footer">Mas Información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <h1>{{ $chart1->options['chart_title'] }}</h1>
                        {!! $chart1->renderHtml() !!}
                        <hr />                       
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
                <div class="text-muted">Copyright &copy; FuelSySteM 2024 | Beta 1.0.2 | ® UEB INMOBILIARIA
                    GUANTANAMO </div>
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
@stop

@section('js')
    <script>
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Acceso a la Pagina Principal",
            showConfirmButton: false,
            timer: 1100
        });
    </script>
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}    
@stop
