{!! Form::open(['url' => 'reportes', 'method' => 'GET', 'autocomplete' => 'off', 'role' => 'search']) !!}
<div class="form-group">
    <label for="fecha_inicio">Fecha Inicial</label>
    <input type="date" class="form-control" name="fecha_inicio" value="{{ old('fecha_inicio') }}">
</div>
<div class="form-group">
    <label for="fecha_fin">Fecha Final</label>
    <input type="date" class="form-control" name="fecha_fin" value="{{ old('fecha_fin') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Buscar</button>
</div>
{!! Form::close() !!}