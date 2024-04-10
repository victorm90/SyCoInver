<div class="form-group">
    <span class="input-group-addon"><i class="fa fa-check"></i></span>
    {!! Form::label('name' ,'Nombre del Importador:') !!}                    
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el Importador....']) !!}                   
    @error('name')
     <span class="text-danger">{{$message}}</span>                        
    @enderror
</div>                
