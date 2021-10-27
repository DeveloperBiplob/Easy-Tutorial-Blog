@extends('Backend.Layouts.backend_master')

@section('title', 'Admin | Posts')

@section('master-content')
    <div class="card m-3">
        <div class="card-header">
            <h3 class="text-info float-left">Manage Post</h3>
            <a href="{{ route('admin.post.create') }}" class="btn btn-success btn-sm float-right">Create Post</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="postsTable">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Tags</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>View</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $post->author->name }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>
                                @foreach ($post->tags as $tag)
                                <span class="badge badge-primary">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $post->title }}</td>
                            <td><img width="100px" style="border:2px solid rgb(255, 123, 0)" src="{{ asset($post->image) }}" alt=""></td>
                            <td><span class="badge badge-primary">{{ 100 }} </span></td>
                            <td><span class="badge badge-{{ $post->status == 'Active' ? 'primary' : 'danger' }}">{{ $post->status }} </span></td>
                            <td>
                                @if($post->status === 'Active')
                                <a href="{{ route('admin.post.status', $post->slug) }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-down fa-lg"></i></i></a>
                                @else
                                <a href="{{ route('admin.post.status', $post->slug) }}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-up fa-lg"></i></i></a>
                                @endif


                                <a href="{{ route('admin.post.show', $post->slug) }}" class="btn btn-secondary btn-sm"><i class="fa fa-eye fa-lg"></i></i></a>
                                <a href="{{ route('admin.post.edit', $post->slug) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                                <button type="button" class="btn btn-danger btn-sm d-inline-block" data-toggle="modal" data-target="#deletePost-{{ $post->slug }}"><i class="fa fa-trash-o fa-lg"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

  <!-- Modal -->
    @foreach ($posts as $post)
    <div class="modal fade" id="deletePost-{{ $post->slug }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Categoy</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are You Sure To Delete This Post!
              <h6>Post Title: {{ $post->title }}</h6>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                <form action="{{ route('admin.post.destroy', $post->slug) }}" method="POST">
                    @csrf
                    @method('DELETE')
                  <button type="submit" class="btn btn-primary">Yes | Delelte</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach

@push('script')
    <script>
        $(document).ready( function () {
            $('#postsTable').DataTable();
        } );
    </script>
@endpush
