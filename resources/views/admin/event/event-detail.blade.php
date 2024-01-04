@extends('admin.layout.main')

@section('title', 'Detail Galeri Kegiatan')

@section('link')
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    
@endsection

@section('style')
    <style>
        .gallery img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }

        .gallery img:hover {
            transform: scale(1.05);
        }
    </style>
@endsection

@section('content')
    <table class="table table-bordered table-responsif text-center">
        <tr>
            <td>Nama Kegiatan</td>
            <th>{{ $event->name }}</th>
        </tr>
    </table>

    <div class="container mt-4">
        <div class="row gallery">
            @foreach ($event->eventPicture as $picture)
                <div class="col-md-4 mb-3">
                    <a href="{{ asset("images/event/$picture->path") }}" data-lightbox="gallery-item">
                        <img src="{{ asset("images/event/$picture->path") }}" alt="{{ $picture->path }}" class="img-fluid">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection



@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script>
    lightbox.option({
      'resizeDuration': 0,
      'wrapAround': false
    })
</script>
@endsection
