@extends('visitor.layout.main')

@section('title', 'Unit Layanan Pengaduan')

@section('style')
    <style>
        .bold-sub {
            font-weight: 500;
            font-size: 20px;
        }

        .img-responsive {
            width: 90%; /* Default for small screens */
        }

        @media (min-width: 600px) {
            .img-responsive {
                width: 75%; /* Medium screens */
            }
        }

        @media (min-width: 992px) {
            .img-responsive {
                width: 40%; /* Large screens */
            }
        }
    </style>
@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Unit Layanan Pengaduan</h1>
    </div>

    <div class="container mb-5">
        <div class="d-flex justify-content-center">
            <img class="img-responsive" src="{{ asset('visitor/assets/img/promkes/Promkes Front.jpg') }}">
        </div>
        
        <p class="text-center text-black bold-sub">Ruangan Unit Layanan Pengaduan</p>
    </div>

    <div class="container mb-5">
        <div class="d-flex justify-content-center">
            <img  class="img-responsive" src="{{ asset('visitor/assets/img/alur-pelayanan/Pengaduan.jpg') }}">
        </div>
        <p class="text-center text-black bold-sub">Bagan Alur Pengaduan</p>
    </div>

    <div class="container mb-5">
        <div class="d-flex justify-content-center">
            <img class="img-responsive" src="{{ asset('visitor/assets/img/qrcode/QR Code Formulir Keluhan Pasien - RSUD dr. M. Haulussy.png') }}">
        </div>
        <div class="d-flex justify-content-center">
            <a class="text-center" href="https://tinyurl.com/FormulirKeluhanPasien">https://tinyurl.com/FormulirKeluhanPasien</a>
        </div>
        <p class="text-center text-black bold-sub">Formulir Keluhan Pasien</p>        
    </div>

    <div class="container">
        <div class="mt-4 text-center">
            <h3 class="text-danger mb-2"><b class="">Unit Pengaduan </b></h3>
            <h3 class="text-black text-stretch">0812 4788 6931</h3>
        </div>
    </div>

@endsection
