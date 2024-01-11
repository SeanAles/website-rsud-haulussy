@extends('visitor.layout.main')

@section('title', 'Galeri Kegiatan')


@section('style')
    <style>
        .card-title {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        @media (max-width: 767.98px) {
            .card {
                margin-left: 40px;
                margin-right: 40px;
                margin-bottom: 10px;
            }
        }
    </style>
@endsection


@section('content')
    <div class="text-center mb-5">
        <h1>Galeri Foto</h1>
    </div>
    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">
            @foreach ($events as $event)
                <div class="col">
                    <div class="card mb-4">
                        <a href="/galeri/{{ $event->slug }}">
                            <img src="{{ asset('images/event/' . $event->eventPicture[0]->path) }}" width="300px"
                                height="200px" class="card-img-top" alt="{{ $event->eventPicture[0]->path }}">
                        </a>
                        <div class="card-body">
                            <a href="/galeri/{{ $event->slug }}">
                                <h5 class="card-title"><small>{{ $event->name }}</small></h5>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination">
            {{ $events->links() }}
        </div>
    </div>
@endsection
