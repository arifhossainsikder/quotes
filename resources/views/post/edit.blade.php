@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="/css/select2.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Update quote</h3>
                <hr>
                @include('includes.form_error')
                @if(session()->has('message.level'))
                    <div class="alert alert-{{ session('message.level') }}">
                        {!! session('message.content') !!}
                    </div>
                @endif
                {!! Form::model($post,['method' => 'PATCH', 'action' => ['AdminPostController@update',$post->id], 'class'=>'form-horizontal']) !!}
                <div class="form-group">
                    {!! Form::label('quote','Quote:',['class'=>'control-label col-sm-2']) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea('quote',null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('author_id','Select author:',['class' => 'control-label col-sm-2']) !!}
                    <div class="col-sm-10">
                        {!! Form::select('author_id', $authors, null, ['class' => 'form-control','id'=>'select-author','placeholder' => 'Please select']) !!}
                    </div>

                </div>
                <div class="form-group">
                    {!! Form::label('categories','Select category:',['class' => 'control-label col-sm-2']) !!}
                    <div class="col-sm-10">
                        {!! Form::select('categories[]', $categories, null, ['class' => 'form-control','id'=>'select-category','multiple'=>'multiple']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#select-category").select2();
            $("#select-author").select2({
                placeholder: "Select author",
                allowClear: true
            });
        });
    </script>
@endsection