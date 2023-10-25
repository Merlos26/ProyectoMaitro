
    
    <h1>Formulario {{ $modo}}</h1>

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
             @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
    
@endif



<div class="form-group">
<label for="Nombre">    Nombre</label>
<input type="text" class="form-control" name="Nombre" 
value="{{isset($persona->Nombre)?$persona->Nombre:old('Nombre')}}" id="Nombre"> 
</div>
 

<div class="form-group">
<label for="Apellido">   Apellido</label>
<input type="text" class="form-control" name="Apellido" 
value="{{ isset($persona->Apellido)?$persona->Apellido:old('Apellido') }}" 
id="Apellido">
</div>
 

<div class="form-group">
<label for="Telefono">   Telefono</label>
<input type="text" class="form-control" name="Telefono" 
value="{{ isset($persona->Telefono)?$persona->Telefono:old('Telefono') }}"
 id="Telefono">
</div>
 

<div class="form-group">
<label for="Correo">    Correo</label>
<input type="text" class="form-control" name="Correo" 
value="{{ isset($persona->Correo)?$persona->Correo:old('Correo')}}" id="Correo">
</div>

<div class="form-group">
<label for="Direccion">    Direccion</label>
<input type="text" class="form-control" name="Direccion" 
value="{{ isset($persona->Direccion)?$persona->Direccion:old('Direccion')}}" id="Direccion">
</div>
 
<br>
<div class="form-group">
<label for="Foto"> </label>

@if(isset($persona->Foto))
<br>
<img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$persona->Foto}}" width="100" alt="">
@endif
<input type="file" class="form-control" name="Foto" value="" id="Foto">
</div>
 <br>


<input type="submit" class="btn btn-success" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{ url('persona/')}}" class="form-control">Regresar</a>

 