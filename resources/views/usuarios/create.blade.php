@extends('layouts.app') @section('content')
<div class="col-sm-8">
	<h2>
		Nuevo usuario <a href="{{route('usuarios.index')}}"
			class="btn btn-default pull-right">Listar usuarios</a>
	</h2>
<!-- 	@include('usuarios.fragment.error') -->
	{!! Form::open(['route' => 'usuarios.store','id'=>'formUsuario','files'=>true]) !!}

	@include('usuarios.fragment.form') {!! Form::close() !!}



</div>
<div class="col-sm-4">@include('usuarios.fragment.aside')</div>
@endsection
