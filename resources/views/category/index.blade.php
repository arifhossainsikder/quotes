@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Categories</h2>
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
                    <th>Title</th>
                    <th>View</th>

                </tr>
                </thead>
                <tbody>
                @if($categories)
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td><a href="{{ route('category.show',$category->id) }}" class="btn btn-default">View</a></td>
                            {{--<td><a href="{{ route('category.edit',$category->id) }}"><i--}}
                                            {{--class="fa fa-edit fa-2x"></i></a></td>--}}
                            {{--<td><a href="#"><i class="fa fa-trash fa-2x"></i></a></td>--}}
                        </tr>
                    @endforeach

                @endif
                </tbody>
            </table>
            {{$categories->render()}}
        </div>
    </div>
    </div>
@endsection

@section('scripts')

@endsection