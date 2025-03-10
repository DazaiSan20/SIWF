<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload PDF dengan Dropzone</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Upload PDF dengan Dropzone</h3>
                <form action="{{ route('pdf.store') }}" method="post" enctype="multipart/form-data" class="dropzone" id="pdf-upload">
                    @csrf
                </form>
                <h3 class="text-center mt-3">Upload PDF</h3>
                <div class="text-center">
                    <button type="button" id="upload-btn" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        Dropzone.options.pdfUpload = {
            maxFilesize: 10, // Maksimal ukuran file 10MB
            acceptedFiles: ".pdf", // Hanya menerima file PDF
            addRemoveLinks: true,
            autoProcessQueue: false,
            init: function () {
                var myDropzone = this;
                
                // Tombol untuk memproses unggahan
                $('#upload-btn').click(function (e) {
                    e.preventDefault();
                    myDropzone.processQueue();
                });

                this.on('sending', function (file, xhr, formData) {
                    var data = $('#pdf-upload').serializeArray();
                    $.each(data, function (key, el) {
                        formData.append(el.name, el.value);
                    });
                });

                this.on('success', function (file, response) {
                    alert('PDF berhasil diupload: ' + response.file_name);
                });

                this.on('error', function (file, errorMessage) {
                    alert('Terjadi kesalahan: ' + errorMessage);
                });
            }
        };
    </script>
</body>
</html>
