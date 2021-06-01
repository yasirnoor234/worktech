<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8" >
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <meta http-equiv="X-UA-Compatible" content="ie-edge">
                <meta name="viewport" content="width-device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
        <!-- Latest compiled and minified CSS -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

                <title>Editor Image Upload with Froala Editor</title>
        </head>
<body>
    <div class="container">
    <form action="{{route('editor.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

        <h2>Forala Editor</h2>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Title" name="title" id="title">
        </div>
        <br>
        <div class="mb-3">
            <textarea name="editor" id="editor" cols="30" row="10"></textarea>
        </div>
        <br>
        <button type="button" class="btn btn-primary">Submit</button>
    </form>
    </div>    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js"></script>

    <script>
       var editor = new FroalaEditor('#editor',{
            // Set the image upload parameter.
            imageUploadParam: 'image_param',
            // Set the image upload URL.
            imageUploadURL: "{{route('editor.imageUpload')}}",
            // Set request type.
            imageUploadMethod: 'POST',
            // Additional upload params.
            imageUploadParams: {
                froala: 'true',
                _token: "{{csrf_token()}}"
            },
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