@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Authors</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>View</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Anna</td>
                    <td><img height="50" width="50" src="{{ asset('img/author.jpg') }}" alt="author"></td>
                    <td><a href="{{ route('author.view') }}" class="btn btn-default">View</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection