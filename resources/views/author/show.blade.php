@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if($author->photo)
                    <img src="{{ $author->photo->file }}" alt="{{ $author->name }}"
                         class="img img-responsive img-rounded">
                @else
                    <img src="/img/author.jpg" alt="" class="img-rounded">
                @endif
            </div>
            <div class="col-md-6 details">
                <blockquote>
                    <h5>{{ $author->name }}</h5>
                </blockquote>
                <p>
                    {!! html_entity_decode($author->bio) !!}
                </p>
            </div>
        </div>
        <div class="row action-author">
            <div class="col-md-2">
                <a class="btn alert alert-success text-center" href="{{ route('author.edit',$author->id) }}"><i
                            class="fa fa-edit fa-2x"></i></a>
            </div>
            <div class="col-md-2">
                {!! Form::open(['method' => 'DELETE', 'action' => ['AdminAuthorController@destroy',$author->id], 'class' =>'form-delete']) !!}
                {!! Form::button( '<i class="fa fa-trash fa-2x"></i>', ['type' => 'submit', 'name' => 'delete_modal', 'class' => 'alert alert-danger form-delete'] ) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

{{--Modal for delete--}}
<div class="modal" id="confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you, want to delete {{ $author->name }}?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" id="delete-btn">Delete</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    @include('includes.delete_script')
@endsection