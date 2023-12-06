@extends('admin.layout.main')
@section('title', 'Edit Postingan | ' . $post->id)

@section('content')

    <div class="container">
        <form id="formEditPost">
            @csrf
            <div class="form-group">
                <label for="title">Judul Postingan</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" name="author" id="author" value="{{ $post->author }}">
            </div>

            <label for="description">Konten</label>
            <textarea name="description" id="description" cols="30" rows="10">{{ $post->description }}</textarea>

            <button type="button" onclick="editPostingan({{ $post->id }})" class="btn btn-success mt-1">Simpan</button>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $("#description").summernote({
                placeholder: 'Silahkan Tulis Konten Postingan...',
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

        function editPostingan(id) {
            const title = $('#title').val();
            const author = $('#author').val();
            const description = $('#description').val();

            if (title === '') {
                toastr.error("Judul harus diisi");
            } else if (author === '') {
                toastr.error("Author harus diisi");
            } else if (description === '') {
                toastr.error("Konten harus diisi");
            } else {
                $.ajax({
                    type: 'PATCH',
                    url: '/post/' + id, 
                    data: $('#formEditPost').serialize(),
                    success: function(response) {
                        window.location.href = response.redirect_url;
                    },
                    error: function(error) {
                        const errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage);
                    }
                });
            }
        }
    </script>
@endsection
