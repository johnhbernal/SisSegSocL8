@extends('adminlte::page')

@section('title', 'Dashboard')

<!-- @section('plugins.Sweetalert2', 'true') -->

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<p>Welcome to this beautiful admin panel.</p>
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
@section('js')
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
@stop

@endsection
{{-- <section('footer')
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0
    </div>
    <strong>Copyright © 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>
  @endsection --}}
@stop

