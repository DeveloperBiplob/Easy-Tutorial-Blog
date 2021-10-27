@extends('Backend.Layouts.backend_master')

@section('title', 'Admin | Update Website Details')

@section('master-content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Update Website Details</h4>
            <a href="{{ route('admin.website.index') }}" class="btn btn-success btn-sm"> Back Dashboard</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.website.update', $website->id) }}" method="POST", enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" id="" class="form-control" value="{{ $website->title }}">
            </div>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="image">Logo</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="logo" id="image">
                  <label class="custom-file-label" for="image">Choose Your Website Logo</label>
                </div>
              </div>
            @error('logo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="">Address</label>
                <textarea name="address" id="" class="form-control" rows="3">{{ $website->address }}</textarea>
            </div>
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control" value="{{ $website->email }}">
            </div>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone" id="" class="form-control" value="{{ $website->phone }}">
            </div>
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="">Facebook</label>
                <input type="text" name="facebook" id="" class="form-control" value="{{ $website->facebook }}">
            </div>
            @error('facebook')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="">Twitter</label>
                <input type="text" name="twitter" id="" class="form-control" value="{{ $website->twitter }}">
            </div>
            @error('twitter')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="">Behance</label>
                <input type="text" name="behance" id="" class="form-control" value="{{ $website->behance }}">
            </div>
            @error('behance')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="">Footer</label>
                <textarea name="footer" id="" class="form-control" rows="3" ">{{ $website->footer }}</textarea>
            </div>
            @error('footer')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <button class="btn btn-success btn-block" type="submit">Update Website Informations</button>
            </div>
        </form>
    </div>
</div>
@endsection
