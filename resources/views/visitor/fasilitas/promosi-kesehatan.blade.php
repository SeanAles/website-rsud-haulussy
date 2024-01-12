@extends('visitor.layout.main')

@section('title', 'Promosi Kesehatan')

@section('content')
    <section>
        <div class="text-center mb-5">
            <h1>Promosi Kesehatan</h1>
        </div>

        <div class="text-center">
            <img src="{{ asset("visitor/assets/img/gallery/qr_code.png") }}" alt=""><br>
            <a href="https://tiny.one/Edukasi-Haulussy" target="_blank" class="btn btn-info">Tekan Saya</a>
        </div>
    </section>
@endsection
