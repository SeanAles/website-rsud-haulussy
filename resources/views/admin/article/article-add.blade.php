@extends('admin.layout.main')
@section('title', 'Buat Artikel')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="container">
        <form id="formAddArticle" enctype="multipart/form-data">
            <input type="hidden" id="user_id" name="user_id" value={{ Auth::user()->id }}>
            <div class="form-group">
                <label for="title">Judul Artikel</label>
                <input type="text" class="form-control" name="title" id="title"
                    placeholder="Masukkan Judul Artikel...">
            </div>
            <div class="form-group">
                <label for="author">Pembuat Artikel</label>
                <input type="text" class="form-control" name="author" id="author"
                    placeholder="Masukkan Pembuat Artikel">
            </div>
            <div class="form-group">
                <label for="thumbnail">Thumbnail Artikel</label>
                <input type="file" name="thumbnail" id="thumbnail" class="pb-5 pt-3 form-control">
            </div>
            <label for="description">Konten Artikel</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
            <input type="hidden" id="category" name="category" value="article">

            <button type="button" onclick="addArticle()" class="btn btn-success mt-1 mb-3"
                id="addArticleButton">Posting</button>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $("#description").summernote({
                placeholder: 'Silahkan Tulis Konten Artikel...',
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

        function addArticle() {
            const user_id = $('#user_id').val();
            const category = $('#category').val();
            const title = $('#title').val();
            const author = $('#author').val();
            const description = $('#description').val();
            const fileInput = document.getElementById('thumbnail');
            const thumbnail = fileInput.files[0];
            const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

            if (title === '') {
                toastr.error("Judul artikel harus diisi");
            } else if (author === '') {
                toastr.error("Author artikel harus diisi");
            } else if (!thumbnail) {
                toastr.error("Thumbnail artikel harus diisi");
            } else if (!allowedExtensions.exec(thumbnail.name)) {
                toastr.error("Thumbnail artikel harus memiliki ekstensi (JPG / JPEG/ PNG)");
            } else if (description === '') {
                toastr.error("Konten artikel harus diisi");
            } else {
                document.getElementById("addArticleButton").disabled = true;

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
                    url: '/article',
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
                        document.getElementById("addArticleButton").disabled = false;
                    }
                });
            }
        }
    </script>
@endsection
