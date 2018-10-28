@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Authors</h2>
        <div class="table-responsive">
            @if(session()->has('message.level'))
                <div class="alert alert-{{ session('message.level') }}">
                    {!! session('message.content') !!}
                </div>
            @endif
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
                @if($authors)
                    @foreach($authors as $author)
                        <tr>
                            <td>{{ $author->id }}</td>
                            <td>{{ $author->name }}</td>
                            <td>
                                @if($author->photo)
                                    <img height="50" width="50" src="{{ $author->photo->file }}"
                                         alt="{{ $author->name }}">
                                @else
                                    <img height="50" width="50" src="{{ asset('img/author.jpg') }}" alt="author">
                                @endif
                            </td>
                            <td><a href="{{ route('author.show',$author->id) }}" class="btn btn-default">View</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection