<style>
    .note-editable.card-block {
        height: 400px;
    }
</style>

@extends('Backend.Layouts.backend_master')

@section('title', 'Admin | About Update')

@section('master-content')
    <div class="card m-3">
        <div class="card-header">
            <h3 class="text-info float-left">About Upadate</h3>
            <a href="{{ route('admin.about-us.index') }}" class="btn btn-success btn-sm float-right">Back Dashboard</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.about-us.update', $about_u->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" id="" value="{{ $about_u->title }}" class="form-control">
                </div>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="image" id="image">
                      <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                  </div>
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="description">Description</label>
                    <div class="mb-3">
                        <textarea class="textarea" name="description" id="description" placeholder="Enter your Post Description....">{!! $about_u->description !!}</textarea>
                      </div>
                </div>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Upadate Informations</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
@endpush
