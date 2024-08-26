@extends('dashboard.layouts.layout')

@section('title')
    Borrowed Books
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Borrowed Books</h1>
{{--            <a href="/dashboard/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">New Book</a>--}}
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Borrowed Books List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Borrowed By</th>
                            <th>Borrowed At</th>
                            <th>Due To</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($borrowedBooks as $borrowed)
                            <tr>
                                <td>{{ $borrowed->book->name }}</td>
                                <td>{{ $borrowed->student->name}}</td>
                                <td>{{ $borrowed->borrowed_at }}</td>
                                <td>{{ $borrowed->due_date }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
