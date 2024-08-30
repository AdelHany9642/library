@extends('dashboard.layouts.layout')

@section('title', 'Add new book')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card p-4" style="width: 50%;">

            <div class="d-flex">
                <a href="{{ route('books.index') }}" class="btn btn-primary">Back to List</a>
            </div>
            <h1 class="text-center">Add New Book</h1>

            @include('dashboard.errors')

            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Book Name</label>
                    <input type="text" id="name" class="form-control" name="name">
                </div>

                <div class="mb-3">
                    <label for="author">Author</label>
                    <input type="text" id="author" class="form-control" name="author">
                </div>

                <div class="mb-3">
                    <label for="category">Category</label>
                    <input type="text" id="category" class="form-control" name="category">
                </div>

                <div class="mb-3">
                    <label for="price">Price</label>
                    <input type="text" id="price" class="form-control" name="price">
                </div>

                <div class="mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="text" id="quantity" class="form-control" name="quantity">
                </div>

                <button type="submit" class="btn btn-primary w-100">Create Book</button>
            </form>
        </div>
    </div>
@endsection
