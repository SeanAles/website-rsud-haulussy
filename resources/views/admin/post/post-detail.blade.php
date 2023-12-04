@extends('admin.layout.main')

@section("title", "Detail Postingan")

@section("link")
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> --}}
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection


@section('content')
<div class="container">
    <table class="table table-bordered">
       <tr>
            <td>Judul</td>  
            <td><b>{{ $post->title }}</b></td>  
       </tr>
       <tr>
            <td>Author</td>  
            <td><b>{{ $post->author }}</b></td>  
       </tr>
       <tr>
            <td>Diposting Oleh</td>  
            <td><b>{{ $post->user->name }}</b></td>  
       </tr>
       <tr>
            <td>Tanggal Diposting</td>  
            <td><b>{{ $post->created_at->format('d F Y (H:i)') }}</b></td>  
        </tr>
        <tr>
            <td>Slug</td>  
            <td><b>{{ $post->slug }}</b></td>  
       </tr>

    </table>

    <table class="table table-bordered mt-2">
       <tr>
          <td colspan="2" class="text-center"><b>Konten</b></td>
       </tr>
       <tr>
          <td>
               {!! $post->description !!}
          </td>
       </tr>
    </table>
</div>
@endsection

@section("script")

@endsection
