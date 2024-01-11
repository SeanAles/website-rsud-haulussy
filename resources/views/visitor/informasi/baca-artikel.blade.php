@extends('visitor.layout.main')

@section('title', $article->title)

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
                <h2>{{ $article->title }}</h2>
                <p class="card-text text-muted">/ {{ $article->author }} / {{ $article->created_at->format('d - m - Y') }} </p>
                <img src="{{ asset('images/article/thumbnails/' . $article->thumbnail) }}" class="img-fluid">
                {!! $article->description !!}
            </div>
            <!-- Bagian Kanan (40%) -->
            <div class="col-md-4 col-lg-5 right-panel">
                <hr>
                <h3>Artikel Lainnya</h3>
                <hr>
                @foreach ($articles as $article)
                  <a href="/artikel/{{ $article->slug }}" class="recommended-title text-dark"><p class="text-dark"><strong>{{ $article->title }}</strong></p></a>
                  <hr>
                  @endforeach
            </div>
    
        </div>
    </div>
@endsection
