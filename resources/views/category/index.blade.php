@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Categories</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Anna</td>
                    <td><a href="{{ route('category.edit') }}"><i class="fa fa-edit fa-2x"></i></a></td>
                    <td><a href="#"><i class="fa fa-trash fa-2x"></i></a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection