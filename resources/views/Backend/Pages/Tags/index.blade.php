@extends('Backend.Layouts.backend_master')

@section('title', 'Admin | Tags')

@section('master-content')
    <div class="card m-3">
        <div class="card-header">
            <h3 class="text-info float-left">Manage Tag</h3>
            <a href="{{ route('admin.tag.create') }}" class="btn btn-success btn-sm float-right">Create New Tag</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="tagTable">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>
                                <a href="{{ route('admin.tag.edit', $tag->slug) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                                <button type="button" class="btn btn-danger btn-sm d-inline-block" data-toggle="modal" data-target="#deleteTag-{{ $tag->slug }}"><i class="fa fa-trash-o fa-lg"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

  <!-- Modal -->
    @foreach ($tags as $tag)
    <div class="modal fade" id="deleteTag-{{ $tag->slug }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Tag</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are You Sure To Delete This tag!
              <h6>tag:{{ $tag->name }}</h6>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                <form action="{{ route('admin.tag.destroy', $tag->slug) }}" method="POST">
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
            $('#tagTable').DataTable();
        } );
    </script>
@endpush
