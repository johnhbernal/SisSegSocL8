@extends('layouts.app') 
@section('content')
<div class="col-sm-8">
	<h2>
	{{$usuario->id}}
	<a href="{{route('usuarios.edit',$usuario->id)}}" class="btn btn-default pull-right">Editar</a>
	</h2>
	<h2>{{$usuario->TIPO_DOCUMENTO }}</h2>
	<h2>{{$usuario->PRIMER_NOMBRE}}</h2>
	<h2>{{$usuario->PRIMER_APELLIDO}}</h2>
	
	
   {{ print_r($usuario)}}

 
	
@include('usuarios.fragment.form')

</div>
<div class="col-sm-4">@include('usuarios.fragment.aside')</div>
@endsection
