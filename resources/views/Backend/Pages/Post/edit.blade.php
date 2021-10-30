
<style>
    .note-editable.card-block {
        height: 380px;
    }
</style>

@extends('Backend.Layouts.backend_master')

@section('title', 'Admin | Update Post')

@section('master-content')
    <div class="card m-3">
        <div class="card-header">
            <h3 class="text-info float-left">Update Post</h3>
            <a href="{{ route('admin.post.index') }}" class="btn btn-success btn-sm float-right">Back Dashboard</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.post.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <textarea name="title" class="form-control" id="title" rows="1">{{ $post->title }}</textarea>
                        </div>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_id">Categories</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option>Enter a Category</option>
                                @foreach ($categories as $category)
                                    <option {{ $post->category_id == $category->id ? 'selected' : ''  }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <div class="mb-3">
                                <textarea class="textarea" name="description" id="description" >{!! $post->description !!}</textarea>
                              </div>
                        </div>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="mb-3" style="width: 100px; height:70px">
                                <img width="100%" height="100%" style="border: 1px solid rgb(252, 164, 0)" src="{{ asset($post->image) }}" alt="">
                            </div>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="image" id="image">
                              <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                          </div>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6" style="margin-top: 118px">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Create New Post</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Select Post Tags</label>
                            @foreach ($tags as $tag)
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" @if (in_array($tag->id,$postTags)) checked @endif id="customCheckbox{{ $loop->index + 1 }}" value="option{{ $loop->index + 1 }}">
                                <label for="customCheckbox{{ $loop->index + 1 }}" class="custom-control-label">{{ $tag->name }}</label>
                              </div>
                            @endforeach
                        </div>
                    </div>
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


