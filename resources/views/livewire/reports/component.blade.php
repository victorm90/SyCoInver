<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget">
            <div class="widget-heading">
                <h4 class="card-title text-center"><b>{{ $componentName }}</b></h4>
            </div>

            <div class="widget-content">
                <div class="row">
                    <div class="col-sm-12 col-md-3"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h6>Elige el usuario</h6>
                            <div class="form-group">
                                <select class="form-control">
                                    <option value="0">Todos</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <h6>Elige el Tipo de reporte</h6>
                            <div class="form-group">
                                <select class="form-control">
                                    <option value="0">Dias</option>
                                    <option value="1">Fechas</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-2">
                        <h6>Fecha desde</h6>
                        <div class="form-group">
                            <input type="text" wire:model="dateFrom" class="form-control flatpickr"
                                placeholder="Click pa elegir">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-2">
                    <h6>Fecha hasta</h6>
                    <div class="form-group">
                        <input type="text" wire:model="dateFrom" class="form-control flatpickr"
                            placeholder="Click pa elegir">
                    </div>
                </div>
                <div class="col-sm-12">
                    <button wire:click="$refresh" class="btn btn-dark btn-block">Consultar</button>
                    <a class="btn btn-dark btn-block {{ count($data) < 1 ? 'disable' : '' }}"
                        href="{{ url('report/pdf' . '/' . $userId . '/' . $reporType . '/' . $dateFrom . '/' . $dateTo) }}"
                        target="_blank">General PDF</a>
                    <a class="btn btn-dark btn-block {{ count($data) < 1 ? 'disable' : '' }}"
                        href="{{ url('report/excel' . '/' . $userId . '/' . $reporType . '/' . $dateFrom . '/' . $dateTo) }}"
                        target="_blank">Exportar a Excel</a>
                </div>
            </div>
            <div class="col-sm-12 col-md-9"></div>
            <!----Tabla----->
            <div class="table-responsive">
                <table class="table table-bordered table striped mt-1">
                    <thead class="text-white" style="background: #3B3F5C">
                        <tr>
                            <th class="table-th text-white text-center">Folio</th>
                            <th class="table-th text-white text-center">Folio</th>
                            <th class="table-th text-white text-center">Folio</th>
                            <th class="table-th text-white text-center">Folio</th>
                            <th class="table-th text-white text-center">Fecha</th>
                            <th class="table-th text-white text-center" width="50px">Folio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data) < 1)
                            <tr>
                                <td colspan="5">
                                    <h5>Sin Resultado</h5>
                                </td>
                            </tr>
                        @endif
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center">
                                    <h6>{{ $item->id }}</h6>
                                </td>
                                <td class="text-center">
                                    <h6>{{ $item->id }}</h6>
                                </td>
                                <td class="text-center">
                                    <h6>{{ $item->id }}</h6>
                                </td>
                                <td class="text-center">
                                    <h6>{{ $item->id }}</h6>
                                </td>
                                <td class="text-center">
                                    <h6>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</h6>
                                </td>
                                <td class="text-center" width="50px">
                                    <button wire:click.prevent="getDetailsd({{ $item->id }})"
                                        class="btn btn-dark btn-sm"><i class="fas fa-list"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@include()
</div>

<script>
    /* <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> */ <
    script src = "https://cdn.jsdelivr.net/npm/flatpickr" >
</script>
<link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr(document.getElementByClassName(''), {
            enableTime: false,
            dateFormat: 'Y-m-d',
            locale: {
                firstDayofWeek: 1,
                weekdays: {
                    shorthand: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
                    longhand: [
                        "Domingo",
                        "Lunes",
                        "Martes",
                        "Miércoles",
                        "Jueves",
                        "Viernes",
                        "Sábado",
                    ],
                },
                months: {
                    shorthand: [
                        "Ene",
                        "Feb",
                        "Mar",
                        "Abr",
                        "May",
                        "Jun",
                        "Jul",
                        "Ago",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dic",
                    ],
                    longhand: [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre",
                    ],
                },
            }
        })
        //eventos
        windos.livewire.on('show-modal', Msg=>{
            $('#modalDetails').modal('show')
        })
    })
</script>
