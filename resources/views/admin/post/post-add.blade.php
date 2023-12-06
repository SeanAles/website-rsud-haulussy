@extends('admin.layout.main')
@section('title', 'Buat Postingan')

@section('content')
    <div class="container">
        <form id="formAddPost">
            @csrf
            <input type="hidden" id="user_id" name="user_id" value={{ Auth::user()->id }}>
            <div class="form-group">
                <label for="title">Judul Postingan</label>
                <input type="text" class="form-control" name="title" id="title"
                    placeholder="Masukkan Judul Postingan...">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" name="author" id="author"
                    placeholder="Masukkan Pembuat Postingan">
            </div>
            {{-- <div class="form-group">
                <label for="thumbnail">Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail" class="pb-5 pt-3 form-control">
            </div> --}}
            <label for="description">Konten</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>

            <button type="button" onclick="addPostingan()" class="btn btn-success mt-1 mb-3">Posting</button>
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

        function addPostingan() {
            const title = $('#title').val();
            const author = $('#author').val();
            const description = $('#description').val();
            // const thumbnail = $('#thumbnail')[0].files;
            const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

            if (title === '') {
                toastr.error("Judul harus diisi");
            } else if (author === '') {
                toastr.error("Author harus diisi");
            // } else if (thumbnail.length === 0 || thumbnail.size === 0) {
            //     toastr.error("Thumbnail harus diisi");
            // } else if (!allowedExtensions.exec(thumbnail[0].name)) {
            //     toastr.error("Thumbnail harus memiliki ekstensi (JPG / JPEG/ PNG)");
            } else if (description === '') {
                toastr.error("Konten harus diisi");
            } else {
                $.ajax({
                    type: 'POST',
                    url: '/post',
                    data: $('#formAddPost').serialize(),
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
