@extends('adminlte::page')

@section('title', 'País')

<!-- @section('plugins.Sweetalert2', 'true') -->

@section('content_header')

    <div class="d-flex bd-highlight mb-4">
        <div class="p-2 w-100 bd-highlight">
            <h1>CRUD EVENTOS</h1>
        </div>
        <div class="p-2 flex-shrink-0 bd-highlight">
            <button class="btn btn-success" id="btn-add" data-toggle="tooltip" data-placement="top" title="Crear Eventos">
                CREAR WEB APIS
            </button>
        </div>
    </div>
@stop

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Versión</span>
                  <span id="info-box-1" class="info-box-number">
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Autor</span>
                  <span id="info-box-2" class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                  <span id="info-box"class="info-box-number"><script src="https://www.dolar-colombia.com/widget.js?c=1"></script></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

          </div>
          <!-- /.row -->

          <div id='mensaje'></div>
          <div class="card">
              <div class="card-body">

                  <div id='mensaje'></div>
                  <div class="card">
                      <div class="card-body">
                          <table id="dataTableDivisas" class="display table table-striped table-bordered" style="width:95%">
                              <thead>
                                  <tr>
                                      <th>id</th>
                                      <th>Nombre</th>
                                       <th>ISO</th>
                                      {{-- <th>Cod Teléfono</th>
                                      <th>created</th>
                                      <th>cretedat</th>
                                      <th>updated</th> --}}
                                      <th>Actividades</th>
                                  </tr>
                              </thead>
                              <tfoot>
                                  <tr>
                                      <th>id</th>
                                      <th>Nombre</th>
                                      <th>ISO</th>
                                      {{-- <th>Cod Teléfono</th>
                                      <th>created</th>
                                      <th>cretedat</th>
                                      <th>updated</th> --}}
                                      <th>Actividades</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>

              </div>
          </div>
          </div>
        </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->




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

    <!-- fullCalendar -->
    <link href="{{ asset('plugins/fullcalendar/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/fullcalendar-daygrid/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/fullcalendar-timegrid/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/fullcalendar-bootstrap/main.min.css') }}" rel="stylesheet">


    <link href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet">

@section('js')


    <script src="{{ asset('https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js') }}" defer></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js') }}" defer></script>


    <script src="{{ asset('https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js') }}" defer></script>
    <script src="{{ asset('https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js') }}" defer></script>
    <script src="{{ asset('https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js') }}" defer></script>


    <!-- jQuery UI -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}" defer></script>

    {{-- <script src="{{ asset('ajax/AjaxCrud/AjaxCRUD.js') }}" defer></script> --}}

    <script src="{{ asset('ajax/webAPIS/webAPI.js') }}" defer></script>

    {{--
    <script>
        jQuery('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'YYYY-MM-DD hh:mm A'
            }
        })

    </script> --}}
@endsection
@stop

@stop
