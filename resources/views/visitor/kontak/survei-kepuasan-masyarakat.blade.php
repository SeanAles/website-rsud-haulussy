@extends('visitor.layout.main')

@section('title', 'Survei Kepuasan Masyarakat')

@section('style')

@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Survei Kepuasan Masyarakat</h1>
    </div>

    <div class="text-center">
        <img class="col-10 col-sm-10 col-md-8 col-lg-4 mb-3"
            src="{{ asset('visitor/assets/img/qrcode/QR Code - Formulir Survei Kepuasan Masyarakat - RSUD dr. M. Haulussy.png') }}"
            alt=""><br>
        <a href="https://tinyurl.com/FormulirKepuasanMasyarakat" target="_blank" class="btn btn-primary">Tekan Saya</a>
    </div>
@endsection
