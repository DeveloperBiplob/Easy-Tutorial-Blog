@extends('Backend.Layouts.backend_master')

@section('title', 'Admin | Update Tag')

@section('master-content')
    <div class="card m-3">
        <div class="card-header">
            <h3 class="text-info float-left">update Tag</h3>
            <a href="{{ route('admin.tag.index') }}" class="btn btn-success btn-sm float-right">Back Dashboard</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.tag.update', $tag->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $tag->name }}">
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Update Tag</button>
                </div>
            </form>
        </div>
    </div>
@endsection
