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
                CREAR EVENTOS
            </button>
        </div>
    </div>
@stop

@section('content')



    <div id='mensaje'></div>
    <div class="card">
        <div class="card-body">

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="sticky-top mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Draggable Events</h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- the events -->
                                        <div id="external-events">
                                            <div class="external-event bg-success">Lunch</div>
                                            <div class="external-event bg-warning">Go home</div>
                                            <div class="external-event bg-info">Do homework</div>
                                            <div class="external-event bg-primary">Work on UI design</div>
                                            <div class="external-event bg-danger">Sleep tight</div>
                                            <div class="checkbox">
                                                <label for="drop-remove">
                                                    <input type="checkbox" id="drop-remove">
                                                    remove after drop
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Create Event</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                            <ul class="fc-color-picker" id="color-chooser">
                                                <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                                                <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                                                <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                                                <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                                                <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                                            </ul>
                                        </div>
                                        <!-- /btn-group -->
                                        <div class="input-group">
                                            <input id="new-event" type="text" class="form-control"
                                                placeholder="Event Title">

                                            <div class="input-group-append">
                                                <button id="add-new-event" type="button"
                                                    class="btn btn-primary">Add</button>
                                            </div>
                                            <!-- /btn-group -->
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card card-primary">
                                <div class="card-body p-0">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->

        </div>
    </div>


    @include('./timeManagement/modalCreateEvent')

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

    <script src="{{ asset('ajax/AjaxCrud/AjaxCRUD.js') }}" defer></script>

    <!-- fullCalendar 2.2.5 -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}" defer></script>
    <script src="{{ asset('plugins/fullcalendar/main.min.js') }}" defer></script>
    <script src="{{ asset('plugins/fullcalendar-daygrid/main.min.js') }}" defer></script>
    <script src="{{ asset('plugins/fullcalendar-timegrid/main.min.js') }}" defer></script>
    <script src="{{ asset('plugins/fullcalendar-interaction/main.min.js') }}" defer></script>
    <script src="{{ asset('plugins/fullcalendar-bootstrap/main.min.js') }}" defer></script>

    <script src="{{ asset('plugins/fullcalendar/locales/es-us.js') }}" defer></script>
    <!-- <script src="{{ asset('plugins/popper/popper.min.js') }}" defer></script> -->


    <script src="{{ asset('ajax/timeManagement/calendar.js') }}" defer></script>


    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}" defer></script>
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
