@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Quotes</h2>
        @if(session()->has('message.level'))
            <div class="alert alert-{{ session('message.level') }}">
                {!! session('message.content') !!}
            </div>
        @endif
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
                @if($posts)
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->quote }}</td>
                        <td><a href="{{ route('post.show',$post->id) }}" class="btn btn-default">View</a></td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{$posts->render()}}
        </div>
    </div>
@endsection