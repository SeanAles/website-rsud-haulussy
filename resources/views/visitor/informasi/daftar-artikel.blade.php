@extends('visitor.layout.main')

@section('title', 'Artikel')

@section('style')
    <style>
        .card-title {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Artikel</h1>
    </div>

    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
            @foreach ($articles as $article)
                <div class="col">
                    <div class="card mb-4">
                        <a href="/artikel/{{ $article->slug }}">
                            <img src="{{ asset("images/article/thumbnails/$article->thumbnail") }}" width="300px"
                                height="200px" class="card-img-top" alt="Gambar Berita">
                        </a>
                        <div class="card-body">
                            <a href="/artikel/{{ $article->slug }}">
                                <h5 class="card-title">{{ $article->title }}</h5>
                            </a>
                            <p class="card-text">{{ $article->author }}</p>
                            <p class="card-text"><small class="text-muted">Tanggal Diposting:
                                    {{ $article->created_at->format('d - m - Y') }} </small></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
