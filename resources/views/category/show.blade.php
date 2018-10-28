@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 details">
                <div class="well well-lg">{{ $category->title }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <a class="btn alert alert-success text-center" href="{{ route('category.edit',$category->id) }}"><i
                            class="fa fa-edit fa-2x"></i></a>
            </div>
            <div class="col-md-2">
                {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoryController@destroy',$category->id], 'class' =>'form-delete']) !!}
                {!! Form::button( '<i class="fa fa-trash fa-2x"></i>', ['type' => 'submit', 'name' => 'delete_modal', 'class' => 'alert alert-danger form-delete'] ) !!}
                {!! Form::close() !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <h2>{{ $category->title }}
                    <small> {{ $category->posts->count() }} quotes</small>
                </h2>
            </div>
        </div>

        <div class="row">
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
                        @foreach($category->posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->quote }}</td>
                                <td><a href="{{ route('post.show',$post->id) }}" class="btn btn-default">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    {{--Modal for delete--}}
    <div class="modal" id="confirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Delete Confirmation</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you, want to delete {{ $category->title }}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" id="delete-btn">Delete</button>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('includes.delete_script')
@endsection