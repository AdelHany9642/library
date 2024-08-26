@extends('dashboard.layouts.layout')

@section('title')
    Edit Book
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card p-4" style="width: 50%;">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1>Edit Book</h1>
                <a href="/dashboard" class="btn btn-primary btn-sm">Back to List</a>
            </div>

            <form action="/dashboard/{{ $book->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name">Book Name</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{ $book->name }}">
                </div>

                <div class="mb-3">
                    <label for="author">Author</label>
                    <input type="text" id="author" class="form-control" name="author" value="{{ $book->author }}">
                </div>

                <div class="mb-3">
                    <label for="category">Category</label>
                    <input type="text" id="category" class="form-control" name="category" value="{{ $book->category }}">
                </div>

                <div class="mb-3">
                    <label for="price">Price</label>
                    <input type="text" id="price" class="form-control" name="price" value="{{ $book->price }}">
                </div>

                <div class="mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="text" id="quantity" class="form-control" name="quantity" value="{{ $book->quantity }}">
                </div>

                <button type="submit" class="btn btn-primary w-100">Update Book</button>
            </form>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
