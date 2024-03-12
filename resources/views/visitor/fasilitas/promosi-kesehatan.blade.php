@extends('visitor.layout.main')

@section('title', 'Promosi Kesehatan')

@section('content')
    <div class="text-center mb-5">
        <h1>Promosi Kesehatan</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="text-center col-12 col-sm-12 col-md-8 col-lg-4 mt-3 mb-3">
                <img src="{{ asset('visitor/assets/img/promkes/Promkes 1.png') }}" width="100%" alt="Promkes 1"><br>
            </div>
            <div class="text-center col-12 col-sm-12 col-md-8 col-lg-4 m-0 p-0">
                <img src="{{ asset('visitor/assets/img/gallery/qr_code.png') }}" width="80%" alt="Promkes QR"><br>
                <p class="mt-2"><b>https://tiny.one/Edukasi-Haulussy</b></p>
                <a href="https://tiny.one/Edukasi-Haulussy" target="_blank" class="btn btn-info mb-3">Tekan Saya</a>
            </div>
            <div class="text-center col-12 col-sm-12 col-md-8 col-lg-4 mt-3">
                <img src="{{ asset('visitor/assets/img/promkes/Promkes 2.png') }}" width="100%" alt="Promkes 2"><br>
            </div>
            <div class="text-center col-12 col-sm-12 col-md-8 col-lg-4 mt-3 mb-3">
                <img src="{{ asset('visitor/assets/img/promkes/Promkes 3.png') }}" width="100%" alt="Promkes 3"><br>
            </div>
            <div class="text-center col-12 col-sm-12 col-md-8 col-lg-4 mt-3">
                <img src="{{ asset('visitor/assets/img/promkes/Promkes 4.png') }}" width="100%" alt="Promkes 4"><br>
            </div>
        </div>
    </div>
@endsection
