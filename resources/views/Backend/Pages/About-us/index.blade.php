<style>
.about-card {
        margin: auto;
        box-sizing: border-box;
        box-shadow: 0px 2px 16px -1px #00000040;
    }
    .about-imag {
        width: 100%;
        padding: 10px 10px;
    }
    .description {
        padding: 10px 10px;
        text-align: justify;
        overflow: hidden;
    }
</style>
@extends('Backend.Layouts.backend_master')

@section('title', 'Admin | About Us')

@section('master-content')
    @foreach ($abouts as $about)
    <div class="card m-3">
        <div class="card-header">
            <h3 class="text-info float-left">Manage About Us page</h3>
            <a href="{{ route('admin.about-us.edit', $about->id) }}" class="btn btn-success btn-sm float-right">Update Information</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 m-auto">
                    <div class="about-card">
                        <div class="image">
                            <img class="about-imag" src="{{ asset($about->image) }}" alt="">
                        </div>
                        <div class="description">
                            {!! $about->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
