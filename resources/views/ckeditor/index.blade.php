<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8" >
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <meta http-equiv="X-UA-Compatible" content="ie-edge">
                <meta name="viewport" content="width-device-width, initial-scale=1.0">
                <title>CKEditor</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">


        </head>
        <body>
            <div class="container">
            <br>
                <form action="{{route('ckeditor.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <br>
                    <h3>Title</h3>

                    <br>
                    <div class="mb-4">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
                    </div>
                    <br>
                    <div class="mb-4">
                        <label class="form-label">Textarea</label>
                        <textarea name="editor" class="form-control" id="editor" rows="3"></textarea>
                    </div>
                    <br>
                    <button type="submit" value="Submit" class="btn btn-success">Submit</button>
                </form>
            </div>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('editor', {
                    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                    filebrowserUploadMethod: 'form',
                });

                $(document).ready(function(){
                    $('body').on('submit', '#submitform', function(e){
                        e.preventDefault();

                        $.ajax({
                            url: $(this).attr('action'),
                            data: new FormData(this),
                            type: 'POST',
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(data){
                                alert(data.msg);
                            }
                        });
                    });
                });
            </script> 
        </body>
        
</html>