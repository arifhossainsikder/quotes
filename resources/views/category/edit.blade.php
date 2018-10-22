@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @include('includes.form_error')
                @if(session()->has('message.level'))
                    <div class="alert alert-{{ session('message.level') }}">
                        {!! session('message.content') !!}
                    </div>
                @endif
                {!! Form::model($category,['method' => 'PATCH', 'class'=>'form-horizontal', 'action' => ['AdminCategoryController@update',$category->id]]) !!}
                <div class="form-group">
                    {!! Form::label('title','Title:',['class' => 'control-label col-sm-2']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('title',null, ['class' => 'form-control','id'=> 'title','placeholder' => 'Enter category title']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {!! Form::submit('Update', ['class' => 'btn btn-default']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

