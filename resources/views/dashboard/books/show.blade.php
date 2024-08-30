@extends('dashboard.layouts.layout')

@section('title', 'View Book')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>View Book Details</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th class="table-primary">Name</th>
                        <td>{{ $book->name }}</td>
                    </tr>
                    <tr>
                        <th class="table-primary">Author</th>
                        <td>{{ $book->author }}</td>
                    </tr>
                    <tr>
                        <th class="table-primary">Category</th>
                        <td>{{ $book->category }}</td>
                    </tr>
                    <tr>
                        <th class="table-primary">Price</th>
                        <td>{{ $book->price }}</td>
                    </tr>
                    <tr>
                        <th class="table-primary">Quantity</th>
                        <td>{{ $book->getQuantity() }}</td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{ route('books.index') }}" class="btn btn-primary">Back to Books</a>
            </div>
        </div>
    </div>
@endsection
