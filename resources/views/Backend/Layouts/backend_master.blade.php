@extends('Backend.Layouts.backend_primary')

@section('Primary-content')
<div class="wrapper">

    <!-- Header Content -->
  @include('Backend.Partials.header')

    <!-- Main Sidebar Container -->
  @include('Backend.Partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
  {{-- @include('Backend.Partials.bradcame') --}}
      <!-- /.content-header -->
      <span>
        @if(session('message'))
        <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      @endif
      </span>

      <!-- Main content -->
        @yield('master-content')
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  @include('Backend.Partials.footer')
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
@endsection
