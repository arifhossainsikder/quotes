@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvzOpl3-kqfNbPcA_u_qEZcSuvu5Je4Ce_FkTMMjxhB-J1wWin-Q"
                     alt="" class="img-rounded">
            </div>
            <div class="col-md-6 details">
                <blockquote>
                    <h5>Fiona Gallagher</h5>
                </blockquote>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis culpa, doloribus error impedit
                    iure perferendis quaerat qui veritatis? Animi deleniti dicta dolorum facere magni, maxime nihil
                    officia quisquam sint voluptatem?
                </p>
            </div>
        </div>
        <div class="row action-author">
            <div class="col-md-6">
                <td><a href="{{ route('author.edit') }}"><i class="fa fa-edit fa-2x"></i></a></td>
                <td><a href="#" class="ml-20"><i class="fa fa-trash fa-2x"></i></a></td>
            </div>
        </div>
    </div>
@endsection