<div class="form-group">
    <span class="input-group-addon"><i class="fa fa-check"></i></span>
    {!! Form::label('name' ,'Nombre de la Entidad:') !!}                    
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre de la Entidad']) !!}                   
    @error('name')
     <span class="text-danger">{{$message}}</span>                        
    @enderror
</div>                
<div class="form-group" >
    <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
    {!! Form::label('addres','Direccion de la Entidad:') !!}
    {!! Form::text('addres', null, ['class'=>'form-control','placeholder'=>'san juan / 12 y 34']) !!}                   
    @error('addres')
     <span class="text-danger">{{$message}}</span>                        
    @enderror
</div> 
<div class="form-group" >
    <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
    {!! Form::label('email','Correo:') !!}
    {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>'example@gmail.com']) !!}                   
    @error('email')
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
<div class="form-group">
    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
    {!! Form::label('provincia_id','Provincia:') !!}
    {!! Form::select('provincia_id',$provincias, null, ['class'=>'form-control']) !!}                   
    
</div>