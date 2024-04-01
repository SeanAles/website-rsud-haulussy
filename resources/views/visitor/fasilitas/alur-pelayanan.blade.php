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
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6">
                <div class="mb-5 square-image">
                    <img width="100%" src="{{ asset('visitor/assets/img/alur-pelayanan/Alur Pelayanan IGD (Update 1).png') }}"
                        alt="Alur Peyananan IGD">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
                <div class="mb-5 square-image">
                    <img width="100%"
                        src="{{ asset('visitor/assets/img/alur-pelayanan/Alur Pelayanan Hemodialisis (Update 1).png') }}"
                        alt="Alur Pelayanan Hemodialisis">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
                <div class="mb-5 square-image">
                    <img width="100%"
                        src="{{ asset('visitor/assets/img/alur-pelayanan/Alur Pelayanan Rawat Jalan (Update 1).png') }}"
                        alt="Alur Pelayanan Rawat Jalan">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
                <div class="mb-5 square-image">
                    <img width="100%"
                        src="{{ asset('visitor/assets/img/alur-pelayanan/Alur Pelayanan Rawat Inap (Update 1).png') }}"
                        alt="Alur Pelayanan Rawat Inap">
                </div>
            </div>
        </div>
    </div>
@endsection
