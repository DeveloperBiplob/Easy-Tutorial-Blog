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
  @include('Backend.Partials.bradcame')
      <!-- /.content-header -->

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
