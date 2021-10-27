@extends('Backend.Layouts.backend_master')

@section('title', 'Admin | Website Details')

@section('master-content')
<div class="card m-3">
    @foreach($websites as $website)
    <div class="card-header">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Manage Website</h4>
            <a href="{{ route('admin.website.edit', $website->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Update Website Information</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover table-dark" id="postTable">
            <tr>
                <th>Title :</th>
                <td>{{ $website->title }}</td>
            </tr>
            <tr>
                <th>logo :</th>
                <td><img width="100px" src="{{ asset($website->logo) }}" alt=""></td>
            </tr>
            <tr>
                <th>Address :</th>
                <td>{{ $website->address }}</td>
            </tr>
            <tr>
                <th>Email :</th>
                <td>{{ $website->email }}</td>
            </tr>
            <tr>
                <th>Phone :</th>
                <td>{{ $website->phone }}</td>
            </tr>
            <tr>
                <th>Facebook :</th>
                <td>{{ $website->facebook }}</td>
            </tr>
            <tr>
                <th>Twitter :</th>
                <td>{{ $website->twitter }}</td>
            </tr>
            {{-- <tr>
                <th>Instagram :</th>
                <td>{{ $website->instagram }}</td>
            </tr> --}}
            <tr>
                <th>Behance :</th>
                <td>{{ $website->behance }}</td>
            </tr>
            <tr>
                <th>Footer :</th>
                <td>{{ $website->footer}}</td>
            </tr>
        </table>
        <div class="row">
            <div class="col-md-12">
                <img width="100%" height="100%" src="{{ asset($website->logo) }}" alt="">
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
