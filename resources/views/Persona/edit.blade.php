@extends('layouts.app')

@section('content')

<div class="container">

<form action="{{url('/Persona/'.$persona->id)}}" method="post" enctype="multipart/form-data">
@csrf

{{method_field('PATCH')}}
@include("Persona.form",['modo'=>'Editar'])
</form>

</div>
@endsection
