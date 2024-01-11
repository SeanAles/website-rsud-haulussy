@extends('visitor.layout.main')

@section('title', 'Berita')

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
    <section id="content">
        <div class="text-center mb-5">
            <h1>Berita</h1>
        </div>

        <div class="container mt-4">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                @foreach ($news as $new)
                    <div class="col">
                        <div class="card mb-4">
                            <a href="/berita/{{ $new->slug }}">
                                <img src="{{ asset("images/news/thumbnails/$new->thumbnail") }}" width="300px"
                                    height="200px" class="card-img-top" alt="Gambar Berita">
                            </a>
                            <div class="card-body">
                                <a href="/berita/{{ $new->slug }}">
                                    <h5 class="card-title">{{ $new->title }}</h5>
                                </a>
                                <p class="card-text">{{ $new->author }}</p>
                                <p class="card-text"><small class="text-muted">Tanggal Diposting:
                                        {{ $new->created_at->format('d - m - Y') }} </small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination">
                {{ $news->links() }}
            </div>
        </div>
        
    </section>
@endsection
