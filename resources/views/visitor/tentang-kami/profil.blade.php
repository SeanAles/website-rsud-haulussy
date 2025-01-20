@extends('visitor.layout.main')

@section('title', 'Profil Rumah Sakit')

@section('link')
    <link rel="stylesheet" href="{{ asset('plugins/lightbox/css/lightbox.min.css') }}">
@endsection

@section('style')
    <style>
        .custom-card {
            margin-bottom: 20px;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;
            transition: all 0.6s ease;
        }

        .custom-card:hover {
            box-shadow: rgba(150, 204, 223, 0.199) -10px 10px, rgba(150, 204, 223, 0.19) -20px 20px;
        }
    </style>
@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Profil Rumah Sakit</h1>
    </div>
    <div class="container mb-5">
        <div class="row align-items-center">
            {{-- <iframe width="560" height="815" src="https://www.youtube.com/embed/2esDJQmP2sE?si=PH5RY-ruosKuwY4E" 
            title="YouTube video player" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            referrerpolicy="strict-origin-when-cross-origin" 
            allowfullscreen>
            </iframe> --}}
            <video controls autoplay controlsList="nodownload">
                <!-- Replace "video.mp4" with the actual path to your video file -->
                <source src="{{ asset('visitor/assets/video/Video Profil Rumah Sakit.mp4') }}" type="video/mp4" >
                <!-- Provide alternative sources for different formats if necessary -->
                <!-- <source src="video.webm" type="video/webm"> -->
                <!-- <source src="video.ogg" type="video/ogg"> -->
                Your browser does not support the video tag.
            </video>
        </div>
    </div>

    <div class="text-center mb-5">
        <h1>PRESTASI RUMAH SAKIT</h1>
    </div>
    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 justify-content-center">
            {{-- piagam 1 --}}
            <div class="col-10 col-sm-10 col-md-7 col-lg-3">
                <div class="card custom-card">
                    <h3 class="card-title text-center pt-3"> SERTIFIKAT 
                        <span><br> FASKES BERKOMITMEN JKN</span>
                    </h3>
                    <div class="base m-3">
                        <a href="{{ asset('visitor/assets/img/sertifikat/sertifikat_BPJS.png') }}" data-lightbox="prestasi" data-title="SERTIFIKAT
FASKES BERKOMITMEN JKN">
                            <img src="{{ asset('visitor/assets/img/sertifikat/sertifikat_BPJS.png') }}" class="card-img-top" alt="IGD">
                        </a>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-center">Sertifikat sebagai faskes tingkat lanjutan berkomitmen JKN.</p>
                      </div>
                      <div class="card-footer text-center text-muted">
                        7 september 2021
                      </div>
                </div>
            </div>
            {{-- piagam 2 --}}
            <div class="col-10 col-sm-10 col-md-7 col-lg-3">
                <div class="card custom-card">
                    <h3 class="card-title text-center pt-3"> PIAGAM 
                        <span><br> PENGHARGAAN COVID</span>
                    </h3>
                    <div class="base m-3">
                        <a href="{{ asset('visitor/assets/img/sertifikat/piagam_covid.png') }}" data-lightbox="prestasi" data-title="Piagam Penghargaan COVID">
                            <img src="{{ asset('visitor/assets/img/sertifikat/piagam_covid.png') }}" class="card-img-top" alt="IGD">
                        </a>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-center">Piagam Penghargaan dari Gubernur Maluku & Walikota Ambon atas Pelayanan Penanganan Covid-19 dan Pelayanan Penyakit lainnya.</p>
                      </div>
                      <div class="card-footer text-center text-muted">
                        September 2021
                      </div>
                </div>
            </div>
            {{-- piagam 3 --}}
            <div class="col-10 col-sm-10 col-md-7 col-lg-3">
                <div class="card custom-card">
                    <h3 class="card-title text-center pt-3"> SERTIFIKAT 
                        <span><br> AKREDITASI RUMAH SAKIT</span>
                    </h3>
                    <div class="base m-3">
                        <a href="{{ asset('visitor/assets/img/sertifikat/sertifikat_akreditasi.png') }}" data-lightbox="prestasi" data-title="SERTIFIKAT AKREDITASI RUMAH SAKIT">
                            <img src="{{ asset('visitor/assets/img/sertifikat/sertifikat_akreditasi.png') }}" class="card-img-top" alt="IGD">
                        </a>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-center">Sertifikat Akreditasi RS dengan Tingkat Kelulusan PARIPURNA.</p>
                      </div>
                      <div class="card-footer text-center text-muted">
                        11 April 2023
                      </div>
                </div>
            </div>
            {{-- piagam 4 --}}
            <div class="col-10 col-sm-10 col-md-7 col-lg-3">
                <div class="card custom-card">
                    <h3 class="card-title text-center pt-3"> PIAGAM 
                        <span><br> PENGHARGAAN OMBUDSMAN </span>
                    </h3>
                    <div class="base m-3">
                        <a href="{{ asset('visitor/assets/img/sertifikat/piagam_ombudsman.png') }}" data-lightbox="prestasi" data-title="PIAGAM PENGHARGAAN OMBUDSMAN">
                            <img src="{{ asset('visitor/assets/img/sertifikat/piagam_ombudsman.png') }}" class="card-img-top" alt="IGD">
                        </a>
                        <div class="middle">
                            <div class="text">John Doe</div>
                          </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-center">Piagam Penghargaan Pelayanan Publik oleh Ombudsman RI dengan Predikat KUALITAS TINGGI.</p>
                      </div>
                      <div class="card-footer text-center text-muted">
                        14 November 2024
                      </div>
                </div>
            </div>

        </div>
    </div>

    @endsection
    
    @section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('plugins/lightbox/js/lightbox.min.js') }}"></script>
    <script>
        lightbox.option({
            maxWidth: 800,  // Lebar maksimum gambar
            maxHeight: 600, // Tinggi maksimum gambar
            resizeDuration: 500,
            wrapAround: true, // Aktifkan navigasi untuk gambar berikutnya dan sebelumnya
            albumLabel: "Gambar ke %1 dari %2", // Label album
            fitImagesInViewport: true
        });
    </script>
    @endsection
    