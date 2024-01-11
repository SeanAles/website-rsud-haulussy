@extends('visitor.layout.main')

@section('title', $event->name)

@section('style')

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
                        <img class="text-center" src="{{ asset("images/event/".$picture->path) }}" class="card-img-top img-fluid" width="100%"
                        height="200px" alt="{{ $picture->path }}">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
