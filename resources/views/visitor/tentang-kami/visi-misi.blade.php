@extends('visitor.layout.main')

@section('title', 'Visi & Misi')

@section('content')
    <div class="text-center mb-5">
        <h1>Visi & Misi</h1>
    </div>

    <div class="bg-holder bg-size"
        style="background-image:url(/visitor/assets/img/gallery/about-bg.png);background-position:top center;background-size:contain;">
    </div>

    <div class="container">
        <div class="row align-items-center p-5 mb-3">
            <h3>Maklumat dan Janji Pelayanan</h3>
            <img src="{{ asset('visitor/assets/img/visi-misi/Maklumat Janji dan Pelayanan.jpg') }}" alt="Maklumat dan Janji Pelayanan">
        </div>

        <div class="row align-items-center mt-5 p-5 mb-3">
            <h3>Maklumat dan Janji Pelayanan</h3>
            <img src="{{ asset('visitor/assets/img/visi-misi/Visi dan Misi.jpg') }}" alt="Maklumat dan Janji Pelayanan">
        </div>
    </div>
@endsection
