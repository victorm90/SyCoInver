<div class="form-group">
    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
    {!! Form::label('entidade_id','Nombre de la Entidad:') !!}
    {!! Form::select('entidade_id',$entidades, null, ['class'=>'form-control']) !!}                
    @error('entidade_id')
     <span class="text-danger">{{$message}}</span>                        
    @enderror
</div>                
<div class="form-group" >
    <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
    {!! Form::label('name','Instalacion:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}                   
    @error('addres')
     <span class="text-danger">{{$message}}</span>                        
    @enderror
</div> 
<div class="form-group">
    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
    {!! Form::label('obras_id','Obra:') !!}
    {!! Form::select('obras_id',$obras, null, ['class'=>'form-control']) !!}                
    @error('obra_id')
     <span class="text-danger">{{$message}}</span>                        
    @enderror
</div> 
<div class="form-group">
    <span class="input-group-addon"><i class="fa fa-bars"></i></span>
    {!! Form::label('creeup','Codigo Reeup:') !!}
    {!! Form::number('creeup', null, ['class'=>'form-control','placeholder'=>'321.21.36983']) !!}                   
    @error('creeup')
     <span class="text-danger">{{$message}}</span>                        
    @enderror
</div> 
<div class="form-group">
    <span class="input-group-addon"><i class="fa fa-bars"></i></span>
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::number('telefono', null, ['class' => 'form-control', 'placeholder' => '53693632']) !!}
    @error('telefono')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
