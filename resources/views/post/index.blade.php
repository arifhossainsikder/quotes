@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Quotes</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Quote</th>
                    <th>View</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Anna</td>
                    <td><a href="{{ route('post.view') }}" class="btn btn-default">View</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection