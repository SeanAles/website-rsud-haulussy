@extends('admin.layout.main')
@section('title', 'Buat Berita')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div>
        <form id="formAddNews" enctype="multipart/form-data">
            <input type="hidden" id="user_id" name="user_id" value={{ Auth::user()->id }}>
            <div class="form-group">
                <label for="title">Judul Berita</label>
                <input type="text" class="form-control" name="title" id="title"
                    placeholder="Masukkan Judul Berita...">
            </div>
            <div class="form-group">
                <label for="author">Pembuat Berita</label>
                <input type="text" class="form-control" name="author" id="author"
                    placeholder="Masukkan Pembuat Berita... ">
            </div>
            <div class="form-group">
                <label for="thumbnail">Thumbnail Berita (maks: 1024kb)</label>
                <input type="file" name="thumbnail" id="thumbnail" class="pb-5 pt-3 form-control">
            </div>
            <label for="description">Konten Berita</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
            <input type="hidden" id="category" name="category" value="news">

            <button type="button" onclick="addNews()" class="btn btn-success mt-1 mb-3"
                id="addNewsButton">Posting</button>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $("#description").summernote({
                placeholder: 'Silahkan Tulis Konten Berita...',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'picture', 'table']],
                    ['view', ['fullscreen']],
                ],
            });
        });

        function addNews() {
            
            const user_id = $('#user_id').val();
            const category = $('#category').val();
            const title = $('#title').val();
            const author = $('#author').val();
            const description = $('#description').val();
            const fileInput = document.getElementById('thumbnail');
            const thumbnail = fileInput.files[0];
            const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            const maxSizeInBytes = 1 * 1024 * 1024; // 1024 kb

            if (title === '') {
                toastr.error("Judul berita harus diisi");
            } else if (author === '') {
                toastr.error("Pembuat berita harus diisi");
            } else if (!thumbnail) {
                toastr.error("Thumbnail berita harus diisi");
            } else if (!allowedExtensions.exec(thumbnail.name)) {
                toastr.error("Thumbnail berita harus memiliki ekstensi (JPG / JPEG/ PNG)");
            } else if(thumbnail.size > maxSizeInBytes){
                toastr.error("Ukuran gambar thumbnail maksimal 1024 kb")
            } else if (description === '') {
                toastr.error("Konten berita harus diisi");
            } else {
                document.getElementById("addNewsButton").disabled = true;
                
                let formData = new FormData();
                formData.append('thumbnail', thumbnail);
                formData.append("user_id", user_id);
                formData.append("title", title);
                formData.append("author", author);
                formData.append("description", description);
                formData.append("category", category);

                const csrfToken = $('meta[name=csrf-token]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: '/news',
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-CSRF-Token', csrfToken);
                    },
                    success: function(response) {
                        window.location.href = response.redirect_url;
                    },
                    error: function(error) {
                        const errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage);
                        document.getElementById("addNewsButton").disabled = false;
                    }
                });
            }
        }
    </script>
@endsection
