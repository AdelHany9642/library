@extends('dashboard.layouts.layout')

@section('title')
    View Book
@endsection

@section('content')
    <br>
    <h1 class="ml-3">View Book Details</h1><br><br>
    <table class="table ml-3">
        <thead>
        <tr>
            <th scope="col" class="table-primary">Name</th>
            <th scope="col" class="table-primary">Author</th>
            <th scope="col" class="table-primary">Category</th>
            <th scope="col" class="table-primary">Price</th>
            <th scope="col" class="table-primary">Quantity</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{ $book->name }}</th>
            <td>{{ $book->author }}</td>
            <td>{{ $book->category }}</td>
            <td>{{ $book->price }}</td>
            <td>{{ $book->quantity }}</td>
        </tr>
        </tbody>
    </table>
    <a href="{{ route('books.index') }}" class="btn btn-primary ml-3">Back to Books</a>
@endsection
