@extends('layouts.app')

@section('content')
<div class="container">
    
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{Session::get('mensaje')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    



<a href="{{ url('Persona/create')}}" class="btn btn-success">Registrar nueva Persona</a>
<br><br>
<table class="table table-light table-striped table-bordered dt-responsive nowrap table-filter">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Direccion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <!--//foreach en blade !-->
        @foreach($personas as $person) 
        <tr>
            <td>{{$person->id}}</td> <!--//instuccion en blade !-->
            <td>
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$person->Foto}}" width="100" alt="">
                
            </td>


            <td>{{$person->Nombre}}</td>
            <td>{{$person->Apellido}}</td>
            <td>{{$person->Telefono}}</td>
            <td>{{$person->Correo}}</td>
            <td>{{$person->Direccion}}</td>
            <td>
                <a href="{{url('/Persona/'.$person->id.'/edit')}}" class="btn btn-warning">Editar</a>
             | 

            <form action="{{url('/Persona/'.$person->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                <input class="btn btn-danger" type="submit" onclick="return confirm('Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table> 
{!! $personas->links() !!}
</div>
@endsection