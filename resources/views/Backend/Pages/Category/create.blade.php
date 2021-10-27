@extends('Backend.Layouts.backend_master')

@section('title', 'Admin | Create Category')

@section('master-content')
    <div class="card m-3">
        <div class="card-header">
            <h3 class="text-info">Create Category</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.category.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter a category Name">
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Create New Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection
