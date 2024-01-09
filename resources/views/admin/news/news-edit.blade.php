@extends('admin.layout.main')
@section('title', 'Edit Berita')

@section('content')

    <div>
        <form id="formEditNews">
            @csrf
            <div class="form-group">
                <label for="title">Judul Berita</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $news->title }}">
            </div>
            <div class="form-group">
                <label for="author">Pembuat Berita</label>
                <input type="text" class="form-control" name="author" id="author" value="{{ $news->author }}">
            </div>

            <label for="description">Konten Berita</label>
            <textarea name="description" id="description" cols="30" rows="10">{{ $news->description }}</textarea>

            <button type="button" onclick="editNews({{ $news->id }})" class="btn btn-success mt-1" id="editNewsButton">Simpan</button>
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

        function editNews(id) {
            const title = $('#title').val();
            const author = $('#author').val();
            const description = $('#description').val();

            if (title === '') {
                toastr.error("Judul Berita harus diisi");
            } else if (author === '') {
                toastr.error("Pembuat Berita harus diisi");
            } else if (description === '') {
                toastr.error("Konten Berita harus diisi");
            } else {
                document.getElementById("editNewsButton").disabled = true;
                $.ajax({
                    type: 'PATCH',
                    url: '/news/' + id, 
                    data: $('#formEditNews').serialize(),
                    success: function(response) {
                        window.location.href = response.redirect_url;
                    },
                    error: function(error) {
                        const errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage);
                        document.getElementById("editNewsButton").disabled = false;
                    }
                });
            }
        }
    </script>
@endsection
