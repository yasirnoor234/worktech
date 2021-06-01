@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Post</div>

                <div class="card-body row">

                            <div class="col-12 ofset-6">
                                <input type="text" class="form-control" placeholder="Title">
                                <textarea name="editor"></textarea>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>

            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
            <script>
                            CKEDITOR.replace('editor', {
                                filebrowserImageBrowserUrl: '/filemanager/ckeditor',
                                filebrowserBrowserUrl: '/filemanager/ckeditor',
                            });
            </script>

@endsection
