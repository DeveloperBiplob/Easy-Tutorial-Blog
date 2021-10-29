@extends('Backend.Layouts.backend_master')

@section('title', 'Admin | Contact')

@section('master-content')
    <div class="card m-3">
        <div class="card-header">
            <h3 class="text-info float-left">Manage Contact</h3>
            <a href="" class="btn btn-success btn-sm float-right disabled">Reply</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="contactTable">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subsect</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->subject }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>
                                <a href="" class="btn btn-xs btn-success">Reply</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready( function () {
            $('#contactTable').DataTable();
        } );
    </script>
@endpush
