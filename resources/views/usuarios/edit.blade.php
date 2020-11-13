@extends('layouts.app') 
@section('content')
<div class="col-sm-8">
	<h2>
	Editar usuario
	<a href="{{route('usuarios.index')}}" class="btn btn-default pull-right">Listar usuarios</a>
	</h2>
	@include('usuarios.fragment.error')
{!! Form::model($usuario, ['route' => ['usuarios.update', $usuario->id], 'method' => 'PUT','id'=>'formUsuarioEdit','files'=>true]) !!}
			
			@include('usuarios.fragment.form')
			
		{!! Form::close() !!}

</div>
@include('usuarios.fragment.aside')
@endsection
