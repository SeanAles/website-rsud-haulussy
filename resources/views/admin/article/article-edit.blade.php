@extends('admin.layout.main')
@section('title', 'Edit Artikel')

@section('content')

    <div>
        <form id="formEditArticle">
            @csrf
            <div class="form-group">
                <label for="title">Judul Artikel</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $article->title }}">
            </div>
            <div class="form-group">
                <label for="author">Pembuat Artikel</label>
                <input type="text" class="form-control" name="author" id="author" value="{{ $article->author }}">
            </div>

            <label for="description">Konten Artikel</label>
            <textarea name="description" id="description" cols="30" rows="10">{{ $article->description }}</textarea>

            <button type="button" onclick="editArticle({{ $article->id }})" class="btn btn-success mt-1" id="editArticleButton">Simpan</button>
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

        function editArticle(id) {
            const title = $('#title').val();
            const author = $('#author').val();
            const description = $('#description').val();

            if (title === '') {
                toastr.error("Judul Artikel harus diisi");
            } else if (author === '') {
                toastr.error("Pembuat Artikel harus diisi");
            } else if (description === '') {
                toastr.error("Konten Artikel harus diisi");
            } else {
                document.getElementById("editArticleButton").disabled = true;
                $.ajax({
                    type: 'PATCH',
                    url: '/article/' + id, 
                    data: $('#formEditArticle').serialize(),
                    success: function(response) {
                        window.location.href = response.redirect_url;
                    },
                    error: function(error) {
                        const errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage);
                        document.getElementById("editArticleButton").disabled = false;
                    }
                });
            }
        }
    </script>
@endsection
