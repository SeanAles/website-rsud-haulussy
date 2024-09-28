@extends('visitor.layout.main')

@section('title', 'Promosi Kesehatan')

@section('style')
    <style>
        .restream-button {
            font-size: 15px;
            color: black;
        }

        .restream-text {
            color: #283779;
            font-weight: 500;
        }
    </style>
@endsection



@section('content')
    <div class="text-center mb-5">
        <h1>Promosi Kesehatan</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">

            <div class="text-center col-12 col-sm-12 col-md-8 col-lg-4 mt-3">
                <img src="{{ asset('visitor/assets/img/promkes/Promkes Long Banner.jpg') }}" width="100%"
                    alt="Promkes 2"><br>
            </div>
            <div class="text-center col-12 col-sm-12 col-md-8 col-lg-4 m-0 p-0">
                <img src="{{ asset('visitor/assets/img/gallery/qr_code.png') }}" width="80%" alt="Promkes QR"><br>
                <p class="mt-2"><b>https://tiny.one/Edukasi-Haulussy</b></p>
                <a href="https://tiny.one/Edukasi-Haulussy" target="_blank" class="btn btn-info mb-3">Tekan Saya</a>
            </div>
            <div class="text-center col-12 col-sm-12 col-md-8 col-lg-4 mt-3">
                <img src="{{ asset('visitor/assets/img/iklan/Promkes Iklan.jpg') }}" width="100%" alt="Promkes 4"><br>
            </div>
            <div class="text-center col-12 col-sm-12 col-md-8 col-lg-4 mt-3">
                <img src="{{ asset('visitor/assets/img/iklan/Hari Rabies Sedunia.jpeg') }}" width="100%"
                    alt="Promkes 1"><br>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="text-center col-12 col-sm-12 col-md-8 col-lg-4 mt-3">
                <a href="https://drive.google.com/file/d/1iy9OK3EFvJ4VFEq-KqTTOGCXO8SPlH1M/view?usp=drivesdk">
                    <img src="{{ asset('visitor/assets/img/iklan/Potensi Masalah Saraf Akibat Stunting.jpeg') }}"
                        width="100%" alt="Promkes 3">
                </a>
                <br>
                <div class="container">
                    <p class="restream-button">Dengarkan Ulang? <span><a
                                href="https://drive.google.com/file/d/1iy9OK3EFvJ4VFEq-KqTTOGCXO8SPlH1M/view?usp=drivesdk"
                                class="restream-text">Klik
                                Disini</a></span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="text-center mb-2">
            <h1>Artikel Media Luar</h1>
        </div>
        <table class="table table-bordered table-striped">
            <tr style="color: white; background-color: #283779">
                <th>No.</th>
                <th>Judul Artikel</th>
                <th>Aksi</th>
            </tr>

            @foreach ($promkes as $artikelLuar)
                <tr class="text-black">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $artikelLuar->name }}</td>
                    <td>
                        <a target="_blank" class="download-button" href="{{ $artikelLuar->url }}">Lihat Artikel</a>
                    </td>
                </tr>
            @endforeach



        </table>
    </div>
@endsection
