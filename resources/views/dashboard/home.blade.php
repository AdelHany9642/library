@extends('dashboard.layouts.layout')

@section('title', 'Home')

@section('content')
    <div class="container">
        <h2 class="text-center">Welcome {{ auth()->user()->name }}</h2>
    </div>
@endsection
