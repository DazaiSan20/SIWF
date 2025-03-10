<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropzone Image Upload in Laravel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Dropzone Image Upload in Laravel</h3>
                <form action="{{ route('dropzone.store') }}" method="post" enctype="multipart/form-data" class="dropzone" id="image-upload">
                    @csrf
                </form>
                <h3 class="text-center mt-3">Upload Multiple Images</h3>
                <div class="text-center">
                    <button type="button" id="button" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        Dropzone.options.imageUpload = {
            maxFilesize: 10, // Maksimal ukuran file dalam MB
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            createImageThumbnails: true,
            autoProcessQueue: false,
            init: function () {
                var myDropzone = this;
                
                // AKSI KETIKA BUTTON UPLOAD DI KLIK
                $('#button').click(function (e) {
                    e.preventDefault();
                    myDropzone.processQueue();
                });
                
                this.on('sending', function (file, xhr, formData) {
                    var data = $('#image-upload').serializeArray();
                    $.each(data, function (key, el) {
                        formData.append(el.name, el.value);
                    });
                });
            }
        };
    </script>
</body>
</html>