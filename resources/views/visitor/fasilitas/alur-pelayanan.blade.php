@extends('visitor.layout.main')

@section('title', 'Alur Pelayanan')

@section('style')
    <style>
        .square-image {
            border: 2px solid #283779;
            /* Border berwarna hitam */
            border-radius: 10px;
            /* Radius border */
            padding: 50px;
        }
    </style>
@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Alur Pelayanan</h1>
    </div>

    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-11 col-lg-9 col-xl-7">
                <div class="mb-5 square-image">
                    <img width="100%" src="{{ asset('visitor/assets/img/alur-pelayanan/Alur Pelayanan IGD.jpg') }}"
                        alt="Alur Peyananan IGD">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-11 col-lg-9 col-xl-7">
                <div class="mb-5 square-image">
                    <img width="100%" src="{{ asset('visitor/assets/img/alur-pelayanan/Alur Pelayanan HD.jpg') }}"
                        alt="Alur Pelayanan Hemodialisis">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-11 col-lg-9 col-xl-7">
                <div class="mb-5 square-image">
                    <img width="100%" src="{{ asset('visitor/assets/img/alur-pelayanan/Rawat Jalan New.jpeg') }}"
                        alt="Alur Pelayanan Rawat Jalan">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-11 col-lg-9 col-xl-7">
                <div class="mb-5 square-image">
                    <img width="100%" src="{{ asset('visitor/assets/img/alur-pelayanan/Alur Pelayanan Rawat Inap.jpg') }}"
                        alt="Alur Pelayanan Rawat Inap">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-11 col-lg-9 col-xl-7">
                <div class="mb-5 square-image">
                    <img width="100%" src="{{ asset('visitor/assets/img/alur-pelayanan/Pengaduan New.jpeg') }}"
                        alt="Alur Pengaduan Pasien">
                </div>
            </div>
            <p class="text-danger">
                <b>*Diperbarui 15 Juli 2024</b>
            </p>
        </div>
    </div>
@endsection
