@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Update author info</h3>
                <hr>
                <form class="form-horizontal" action="/action_page.php">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Enter author name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="photo">Upload photo:</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="photo" name="photo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="bio">Bio:</label>
                        <div class="col-sm-10">
                            <textarea name="bio" id="bio"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({selector: 'textarea'});</script>
@endsection