@extends('Backend.Layouts.backend_master')

@section('title', 'Admin | Update Category')

@section('master-content')
    <div class="card m-3">
        <div class="card-header">
            <h3 class="text-info">Create Category</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.category.update', $category->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Update Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection
