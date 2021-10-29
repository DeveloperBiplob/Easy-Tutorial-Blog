@php
    $website = App\Models\Website::find(1);
@endphp
<style>
    .about-us ul li a{
        padding-top: 10px;
    }
</style>
@extends('Frontend.Layouts.frontend_primary')

@section('frontend_primary_content')
@foreach ($abouts as $about)
    <!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="text-content">
                <h4>about us</h4>
                <h2>{{ $about->title }}</h2>
            </div>
            </div>
        </div>
        </div>
    </section>
    </div>

    <!-- Banner Ends Here -->
<section class="about-us">
    <div class="container">

      <div class="row">
        <div class="col-lg-12">
          <img src="{{ asset($about->image) }}" alt="">
        </div>
      </div>

      <div class="row" style="text-align: justify; padding: 20px 20px">
        {!! $about->description !!}
      </div>

      <div class="row">
        <div class="col-lg-12">
          <ul class="social-icons">
            <li><a href="{{ $website->facebook }}"><i class="fa fa-facebook"></i></a></li>
            <li><a href="{{ $website->twitter }}"><i class="fa fa-twitter"></i></a></li>
            <li><a href="{{ $website->behance }}"><i class="fa fa-behance"></i></a></li>
            <li><a href="{{ $website->linkdin }}"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
@endforeach
@endsection
