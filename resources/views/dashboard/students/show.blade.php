@extends('dashboard.layouts.layout')

@section('title')
    View Student
@endsection

@section('content')
    <br>
    <h1 class="ml-3">View Student Details</h1><br><br>
    <table class="table ml-3">
        <thead>
        <tr>
            <th scope="col" class="table-primary">Name</th>
            <th scope="col" class="table-primary">Email</th>
            <th scope="col" class="table-primary">Mobile</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{ $student->name }}</th>
            <td>{{ $student->email }}</td>
            <td>{{ $student->mobile }}</td>
        </tr>
        </tbody>
    </table>
    <a href="/students" class="btn btn-primary ml-3">Back to students</a>
@endsection
