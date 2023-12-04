@extends('admin.layout.main')
@section("title", "Buat Postingan")

@section('content')
  <div class="container">
      <form action="post" method="POST">
          @csrf
          <input type="hidden" id="user_id" name="user_id" value={{ Auth::user()->id }}>
          <div class="form-group">
            <label for="title">Judul Postingan</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan Judul Postingan...">
          </div>
          <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" name="author" id="author" placeholder="Masukkan Pembuat Postingan">
          </div>

          <label for="description">Konten</label>
          <textarea name="description" id="description" cols="30" rows="10"></textarea>
          
          <button type="submit" class="btn btn-success mt-1">Posting</button>
        </form>
  </div>
@endsection

@section("script")
<script>
  $(function () {
    $("#description").summernote(
      {
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
      }
    );
 });
</script>
@endsection
