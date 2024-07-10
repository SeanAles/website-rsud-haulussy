@extends('visitor.layout.main')

@section('title', 'Unit Layanan Pengaduan')

@section('style')
    <style>
        .bold-sub {
            font-weight: 500;
            font-size: 20px;
        }

        .img-responsive {
            width: 90%;
            /* Default for small screens */
        }

        @media (min-width: 600px) {
            .img-responsive {
                width: 75%;
                /* Medium screens */
            }
        }

        @media (min-width: 992px) {
            .img-responsive {
                width: 40%;
                /* Large screens */
            }
        }

        .text-spo {
            font-weight: 500;
            font-size: 20px;
            color: black;
        }

        .button-w {
            width: 225px;
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
            <img class="img-responsive" src="{{ asset('visitor/assets/img/alur-pelayanan/Pengaduan.jpg') }}">
        </div>
        <p class="text-center text-black bold-sub">Bagan Alur Pengaduan</p>
    </div>

    <div class="container mb-5">
        <div class="d-flex justify-content-center">
            <img class="img-responsive"
                src="{{ asset('visitor/assets/img/qrcode/QR Code Formulir Keluhan Pasien - RSUD dr. M. Haulussy.png') }}">
        </div>
        <div class="d-flex justify-content-center">
            <a class="text-center"
                href="https://tinyurl.com/FormulirKeluhanPasien">https://tinyurl.com/FormulirKeluhanPasien</a>
        </div>
        <p class="text-center text-black bold-sub">Formulir Keluhan Pasien</p>
    </div>

    <div class="container text-center mt-5 mb-5">
        <p class="text-spo m-0">SPO Penanganan Pengaduan</p>


        <a target="_blank" href="https://drive.google.com/file/d/19C4LvaZCRcZQAM1hVa-jwXxjCnvEoP2J/view?usp=drive_link"> 
            <button class="btn btn-success mt-2 button-w">
               Saat Jam Kerja
            </button>
        </a>

        <a target="_blank" href="https://drive.google.com/file/d/1e5D3Y0lcqRXlKIcQfc3Pm1gVECvLRVi1/view?usp=drive_link">
            <button class="btn btn-warning mt-2 button-w">
               Diluar Jam Kerja
            </button>
        </a>



    </div>

    <div class="container mt-5">
        <div class="mt-4 text-center">
            <h3 class="text-danger mb-2"><b>Nomor Telepon Unit Layanan Pengaduan </b></h3>
            <h3 class="text-black text-stretch">0812 4788 6931</h3>
        </div>
    </div>

@endsection
