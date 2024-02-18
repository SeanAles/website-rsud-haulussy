@extends('visitor.layout.main')

@section('title', 'Promosi Kesehatan')

@section('content')
    <section>
        <div class="text-center mb-5">
            <h1>Promosi Kesehatan</h1>
        </div>

       <div class="container">
        <div class="row justify-content-center">
            <div class="text-center col-12 col-sm-12 col-md-8 col-lg-4 mt-3">
                <img src="{{ asset("visitor/assets/img/promkes/Kanker Anak Sedunia 1.png") }}" width="100%"  alt="Promkes 1"><br>
            </div>
            <div class="text-center col-12 col-sm-12 col-md-8 col-lg-4 mt-3">
                <img src="{{ asset("visitor/assets/img/gallery/qr_code.png") }}" width="80%" alt="Promkes QR"><br>
                <a href="https://tiny.one/Edukasi-Haulussy" target="_blank" class="btn btn-info">Tekan Saya</a>
            </div>
            <div class="text-center col-12 col-sm-12 col-md-8 col-lg-4 mt-3">
                <img src="{{ asset("visitor/assets/img/promkes/Kanker anak Sedunia 2.png") }}" width="100%"   alt="Promkes 2"><br>
            </div>
        </div>
       </div>
    </section>
@endsection
