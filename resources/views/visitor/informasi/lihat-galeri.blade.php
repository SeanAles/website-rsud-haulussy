@extends('visitor.layout.main')

@section('title', $event->name)

@section('link')
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('plugins/lightbox/css/lightbox.min.css') }}">
@endsection

@section('style')
    <style>
        @media (max-width: 767.98px) {
            .row {
                margin-left: 40px;
                margin-right: 40px;
                margin-bottom: 10px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="text-center mb-5">
        <h3>{{ $event->name }}</h3>
    </div>

    <div class="container-fluid mt-3">
        <div class="row">
            @foreach ($event->eventPicture as $picture)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="card p-3">
                        <a href="{{ asset('images/event/' . $picture->path) }}" data-lightbox="gallery-item">
                            <img class="text-center" src="{{ asset('images/event/' . $picture->path) }}"
                                class="card-img-top img-fluid" width="100%" height="200px" alt="{{ $picture->path }}"
                                style="max-height:300px">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('plugins/lightbox/js/lightbox.min.js') }}"></script>
    <script>
        lightbox.option({
            resizeDuration: 500,
            wrapAround: false,
            albumLabel: "Gambar ke %1 dari %2"
        })
    </script>
@endsection
