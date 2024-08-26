@extends('dashboard.layouts.layout')

@section('title')
    Admin Profile
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Admin Profile</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-lg-6">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
@endsection
