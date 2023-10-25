formulario de creación de empleado
@extends('layouts.app')

@section('content')
<div class="container">
<br><br>
<form action="{{url('/Persona')}}" method="post" enctype="multipart/form-data"> 
    @csrf
    @include("Persona.form",['modo'=>'Crear'])
</form>
</div>
@endsection

