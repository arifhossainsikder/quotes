@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 details">
                <blockquote>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis culpa, doloribus error impedit
                        iure perferendis quaerat qui veritatis? Animi deleniti dicta dolorum facere magni, maxime nihil
                        officia quisquam sint voluptatem?
                    </p>
                    <small><cite>Author name</cite></small>
                    <h5>Category name</h5>
                </blockquote>

            </div>
        </div>
        <div class="row action-author">
            <div class="col-md-6">
                <td><a href="{{ route('post.edit') }}"><i class="fa fa-edit fa-2x"></i></a></td>
                <td><a href="#" class="ml-20"><i class="fa fa-trash fa-2x"></i></a></td>
            </div>
        </div>
    </div>
@endsection