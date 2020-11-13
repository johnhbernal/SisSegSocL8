@extends('adminlte::page')

@section('title', 'Usuario')

<!-- @section('plugins.Sweetalert2', 'true') -->

@section('content_header')





    <div class="d-flex bd-highlight mb-4">
        <div class="p-2 w-100 bd-highlight">
            <h1>CRUD USUARIO</h1>
        </div>
        <div class="p-2 flex-shrink-0 bd-highlight">
            <button class="btn btn-success" id="btn-add" data-toggle="tooltip" data-placement="top" title="Crear Pais">
                CREAR USUARIO
            </button>
        </div>
    </div>
@stop

@section('content')


    <div id='mensaje'></div>
    <div class="card">
        <div class="card-body">
            <table id="dataTableUsuario" class="display table table-striped table-bordered" style="width:95%">
                <thead>

                    <tr>
                        <th>id</th>
                        <th>NUM ID</th>
                        <th>TIPO DOCUMENTO</th>
                        <th>PRIMER_NOMBRE</th>
                        <th>PRIMER_APELLIDO</th>
                        {{-- <th>FECHA_DE_NACIMIENTO</th>
                        <th>ESTADO</th>
                        <th>SEXO</th>
                        <th>GRUPO_SANGUINEO</th>
                        <th>FACTOR_RH</th>
                        <th>ESTADO_CIVIL</th>
                        <th>VINCULO_LABORAL</th>
                        <th>DISCAPACIDAD</th>
                        <th>TIPO_DISCAPACIDAD</th>
                        <th>CONDICION_DISCAPACIDAD</th>
                        <th>ETNIA</th> --}}
                        {{-- <th>created</th>
                        <th>cretedat</th> --}}
                        <th>updated</th>
                        <th>Actividades</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>NUM ID</th>
                        <th>TIPO DOCUMENTO</th>
                        <th>PRIMER_NOMBRE</th>
                        <th>PRIMER_APELLIDO</th>
                        {{-- <th>FECHA_DE_NACIMIENTO</th>
                        <th>ESTADO</th>
                        <th>SEXO</th>
                        <th>GRUPO_SANGUINEO</th>
                        <th>FACTOR_RH</th>
                        <th>ESTADO_CIVIL</th>
                        <th>VINCULO_LABORAL</th>
                        <th>DISCAPACIDAD</th>
                        <th>TIPO_DISCAPACIDAD</th>
                        <th>CONDICION_DISCAPACIDAD</th>
                        <th>ETNIA</th> --}}
                        {{-- <th>created</th>
                        <th>cretedat</th> --}}
                        <th>updated</th>
                        <th>Actividades</th>
                    </tr>
                </tfoot>
            </table>

            @include('./usuarios/perfil/modalCreatePerfil')

        </div>
    @stop

    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
    <link rel="stylesheet" href="vendor/adminlte/dist/css/adminlte.min.css">

    {{--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">


    <link rel="stylesheet" type="text/html" href="//github.com/downloads/lafeber/world-flags-sprite/flags32.css" />

@section('js')


    <script src="{{ asset('https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js') }}" defer></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js') }}" defer></script>


    <script src="{{ asset('https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js') }}" defer></script>
    <script src="{{ asset('https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js') }}" defer></script>
    <script src="{{ asset('https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js') }}" defer></script>


    <script src="{{ asset('ajax/usuarios/Perfil.js') }}" defer></script>

    {{-- <script src="{{ asset('js/Validaciones/validacionDepartamento .js') }}" defer>
    </script> --}}

    <script src="{{ asset('ajax/AjaxCrud/AjaxCRUD.js') }}" defer></script>

    {{-- <script>
        Swal.fire({
            // position: 'top-end',
            position: 'center',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
        })

    </script> --}}
@endsection
@stop

@stop
