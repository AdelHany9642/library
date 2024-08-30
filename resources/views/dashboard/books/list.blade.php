@extends('dashboard.layouts.layout')

@section('title', 'Books')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Books</h1>
            <a href="{{ route('books.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">New Book</a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Books List</h6>
            </div>
            <div class="card-body">
                @include('dashboard.errors')
                @include('dashboard.success')

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Borrows</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->category }}</td>
                                <td>{{ $book->price }}</td>
                                <td>{{ $book->getQuantity() }}</td>
                                <td>{{ $book->getBorrowsCount() }}</td>
                                <td>
                                    @can('view', $book)
                                        <a href="{{ route('books.show', $book) }}" class="btn btn-primary btn-sm">View</a>
                                    @endcan
                                    @can('edit', $book)
                                        <a href="{{ route('books.edit', $book) }}" class="btn btn-success btn-sm">Edit</a>
                                    @endcan
                                    @can('delete', $book)
                                        <form action="{{ route('books.destroy', $book) }}" method="post" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    @endcan

                                    @include('dashboard.books.partials.borrow')
                                    @include('dashboard.books.partials.return')
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $books->links() }}
            </div>
        </div>

    </div>
@endsection
