@extends('visitor.layout.main')

@section('title', $new->title)

@section('style')
    <style>
        @media (min-width: 992px) {
            .right-panel {
                padding-right: 50px;
            }

            .left-panel {
                padding-left: 50px;
            }
        }

        @media (max-width: 767.98px) {

            .left-panel,
            .right-panel {
                margin-top: 20px;
            }
        }

        /* .recommended-title {
              white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            } */
    </style>
@endsection

@section('content')
    <div class="p-4">
        <div class="row">
            <!-- Bagian Kiri (60%) -->
            <div class="col-md-8 col-lg-7 left-panel">
                <h2>{{ $new->title }}</h2>
                <p class="card-text text-muted">/ {{ $new->author }} / {{ $new->created_at->format('d - m - Y') }} </p>
                <img src="{{ asset('images/news/thumbnails/' . $new->thumbnail) }}" class="img-fluid">
                {!! $new->description !!}
            </div>
            <!-- Bagian Kanan (40%) -->
            <div class="col-md-4 col-lg-5 right-panel">
                <hr>
                <h3>Berita Lainnya</h3>
                <hr>
                @foreach ($news as $news)
                    <a href="/berita/{{ $news->slug }}" class="recommended-title text-dark">
                        <p class="text-dark"><strong>{{ $news->title }}</strong></p>
                    </a>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
