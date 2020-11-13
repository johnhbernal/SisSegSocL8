@extends('layouts.app') @section('content')
<link href="{{ asset('/css/jquery.dataTables.min.css') }}"
	rel="stylesheet">
<link href="{{ asset('/jqueryConfirm/css/jquery-confirm.min.css') }}"
	rel="stylesheet">
<script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.select.min.js') }}"></script>
<script src="{{ asset('/jqueryConfirm/js/jquery-confirm.min.js') }}"></script>
<!-- <script src="{{ asset('js/datatable/dataTables.editor.min.js') }}"></script> -->
<script src="{{ asset('js/manageDatatable.js') }}"></script>
<div class="col-md-10 col-md-offset-1">@include('usuarios.fragment.aside')</div>
<div class="col-md-10 col-md-offset-1">
	<h2>Listado de Usuarios</h2>
	
	@include('usuarios.fragment.info') <a
		href="{{route('usuarios.create')}}" class="btn btn-primary pull-right">Nuevo
		Usuario</a> <br>
	<table id="dataTableUsuarios"
		class="table table-striped table-bordered nowrap" cellspacing="0"
		width="100%">
		
		{!!Form::open(['route'=>['destroyUsuario',94061212],'method'=>'DELETE'])!!}
									<a href="#" class='btn-delete'>Eliminar</a> 
		{!! Form::close() !!}
		<thead>
			<tr>
<!-- 				<td width="20px"></td> -->
				<td><p>Actualizacion</p></td>
				<td width="20px"><p class="text-center">ID</p></td>
				<td><p class="text-center">Número de identificación</p></td>
				<td><p class="text-center">Primer Nombre</p></td>
				<td><p class="text-center">Segundo Nombre</p></td>
				<td><p class="text-center">Primer Apellido</p></td>
				<td><p class="text-center">Segundo Apellido</p></td>
				<td><p class="text-center">&nbsp;Acciones</p></td>
			</tr>
		</thead>
		<tbody>

</div>
@endsection
