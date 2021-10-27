@extends('Backend.Layouts.backend_master')

@section('title', 'Admin | Category')

@section('master-content')
    <div class="card m-3">
        <div class="card-header">
            <h3 class="text-info">Manage Category</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="categoryTable">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('admin.category.edit', $category->slug) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                                <button type="button" class="btn btn-danger btn-sm d-inline-block" data-toggle="modal" data-target="#deleteCategory-{{ $category->slug }}"><i class="fa fa-trash-o fa-lg"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

  <!-- Modal -->
    @foreach ($categories as $category)
    <div class="modal fade" id="deleteCategory-{{ $category->slug }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Categoy</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are You Sure To Delete This Category!
              <h6>Category:{{ $category->name }}</h6>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                @if($categories)
                <form action="{{ route('admin.category.destroy', $category->slug) }}" method="POST">
                    @csrf
                    @method('DELETE')
                  <button type="submit" class="btn btn-primary">Yes | Delelte</button>
                </form>
                @endif
            </div>
          </div>
        </div>
      </div>
    @endforeach

@push('script')
    <script>
        $(document).ready( function () {
            $('#categoryTable').DataTable();
        } );
    </script>
@endpush
