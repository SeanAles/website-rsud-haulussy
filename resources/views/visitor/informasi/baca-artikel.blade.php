@extends('visitor.layout.main')

@section('title', $article->title)

@section('style')

@endsection

@section('content')
<div class="p-4">
    <div class="container-fluid">
        <div class="row">
          <!-- Bagian Kiri (60%) -->
          <div class="col-lg-8 left-panel">
            <h1>{{ $article->title }}</h1>
            <img src="{{ asset('images/article/thumbnails/1704863768.jpg') }}" width="100%">
            {!! $article->description !!}
          </div>
          <!-- Bagian Kanan (40%) -->
          <div class="col-lg-4 right-panel">
            <p>Isi dari bagian kanan (40%) di sini...</p>
          </div>
        </div>
    </div>
</div>
@endsection
