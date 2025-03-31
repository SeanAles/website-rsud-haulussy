@extends('visitor.layout.main')

@section('title', 'RSUD dr. M. Haulussy Ambon')

@section('style')
    <style>
        .error {
            color: red;
            margin-left: 17px;
            font-size: 15px;
            display: none;
        }

        .success {
            color: green;
            margin-left: 17px;
            font-size: 15px;
            display: none;
        }

        /* Centang Background */
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.5) !important;
        }

        /* Style Tambahan */
        .modal-content img {
            max-width: 100%;
            height : auto;
        }

        /* Gaya Tombol Close */
        .close-btn {
            position: absolute;
            top: -15px;
            right: -4px;
            z-index: 1050;
            /* Menyimpan di atas modal */
            font-size: 2.5em;
            /* Memperbesar font-size */
        }

        .text-stretch {
            letter-spacing: 0.15em;
            /* adjust the value to stretch text more or less */
        }
    </style>
@endsection

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="gambarModal" tabindex="-1" role="dialog" aria-labelledby="gambarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- Tombol Close -->
                <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <center>
                <div  class="modal-body">
                    <a href="/artikel/sHKk6VAKR9">
                    <img src="{{ asset('visitor/assets/img/iklan/ramadhan.jpg') }}" class="img-fluid"
                        alt="Gambar Modal">
                    </a>
                </div>
                </center>
            </div>
        </div>
    </div>
    <section class="w-100">
        <h1 class="text-center pb-5">Poliklinik</h1>

        <div class="container">
            <h2 class="pb-3">Lantai 1</h2>
            <div class="row pb-5">
                <div class="col-4 col-md-4 col-lg-2 text-xl-start mb-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#dalam" style="font-size: 30px"><i class="fa-solid fa-lungs-virus"></i>
                                <p class="fs-1 fs-xxl-2 text-center">Penyakit Dalam</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="dalam" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/dalam.jpg' }}" width="100%" height="100%"
                                        alt="Penyakit Dalam">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 col-md-4 col-lg-2 text-xl-start mb-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#bedahUmum" style="font-size: 30px"><i
                                    class="fa-solid fa-head-side-mask"></i>
                                <p class="fs-1 fs-xxl-2 text-center">Bedah Umum</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="bedahUmum" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/bedah.jpg' }}" width="100%" height="100%"
                                        alt="Bedah Umum">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 col-md-4 col-lg-2 text-xl-start mb-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#bedahVaskular" style="font-size: 30px"><i
                                    class="fa-solid fa-head-side-mask"></i>
                                <p class="fs-1 fs-xxl-2 text-center">Bedah Vaskular</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="bedahVaskular" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/bedahVaskular.jpg' }}" width="100%"
                                        height="100%" alt="Bedah Vaskular">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 col-md-4 col-lg-2 text-lg-start">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#saraf" style="font-size: 30px"><i class="fa-solid fa-brain"></i>
                                <p class="fs-1 fs-xxl-2 text-center">Saraf</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="saraf" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/saraf.jpg' }}" width="100%" height="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 col-md-4 col-lg-2 text-xl-start mb-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#gigi" style="font-size: 30px"><i class="fa-solid fa-tooth"></i>
                                <p class="fs-1 fs-xxl-2 text-center">Gigi & Mulut</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="gigi" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/gigi.jpg' }}" width="100%" height="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 col-md-4 col-lg-2 text-xl-start mb-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#jantung" style="font-size: 30px"><i class="fa-solid fa-heart-pulse"></i>
                                <p class="fs-1 fs-xxl-2 text-center">Jantung</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="jantung" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/jantung.jpg' }}" width="100%" height="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 col-md-4 col-lg-2 text-xl-start mb-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#asma" style="font-size: 30px"><i
                                    class="fa-solid fa-head-side-cough"></i>
                                <p class="fs-1 fs-xxl-2 text-center">Asma</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="asma" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/asma.jpg' }}" width="100%" height="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 col-md-4 col-lg-2 text-xl-start mb-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#bidan" style="font-size: 30px"><i
                                    class="fa-solid fa-person-pregnant"></i>
                                <p class="fs-1 fs-xxl-2 text-center">Kebidanan-Kandungan & KIA-KB</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="bidan" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/kebidanan.jpg' }}" width="100%"
                                        height="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-4 col-md-4 col-lg-2 text-xl-start mb-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#mata" style="font-size: 30px"><i class="fa-solid fa-eye"></i>
                                <p class="fs-1 fs-xxl-2 text-center">Mata</p>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col-4 col-md-4 col-lg-2 text-xl-start mb-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#hemodialisis" style="font-size: 30px"><i
                                    class="fa-solid fa-droplet"></i>
                                <p class="fs-1 fs-xxl-2 text-center">Hemodialisis</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="hemodialisis" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/hemodialisis.jpg' }}" width="100%"
                                        height="100%" alt="Hemodialisis">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="mata" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/mata.jpg' }}" width="100%" height="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 col-md-4 col-lg-2 text-xl-start mb-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#endoskopi" style="font-size: 30px"><i
                                    class="fa-solid fa-microscope"></i>
                                <p class="fs-1 fs-xxl-2 text-center">Endoskopi</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="endoskopi" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/endoskopi.jpg' }}" width="100%"
                                        height="100%" alt="Endoskopi">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 col-md-4 col-lg-2 text-xl-start mb-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#mcu" style="font-size: 30px">
                                <i class="fa-solid fa-file-waveform"></i>
                                <p class="fs-1 fs-xxl-2 text-center">Medical Check Up (MCU)</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="mcu" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/mcu.jpg' }}" width="100%" height="100%"
                                        alt="Medical Check Up">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="pb-3">Lantai 2</h2>
            <div class="row pb-5">

                <div class="col-4 col-md-4 col-lg-2 text-xl-start mb-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#kulit" style="font-size: 30px"><i
                                    class="fa-solid fa-face-smile-beam"></i>
                                <p class="fs-1 fs-xxl-2 text-center">Kulit & Kelamin</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="kulit" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/kulit.jpg' }}" width="100%" height="100%"
                                        alt="Kulits">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 col-md-4 col-lg-2 text-xl-start mb-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#anak" style="font-size: 30px"><i
                                    class="fa-solid fa-person-breastfeeding"></i>
                                <p class="fs-1 fs-xxl-2 text-center">Anak & Imunisasi</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="anak" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/anak.jpg' }}" width="100%" height="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 col-md-4 col-lg-2 text-xl-start mb-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#bedahDigestive" style="font-size: 30px"><i
                                    class="fa-solid fa-head-side-mask"></i>
                                <p class="fs-1 fs-xxl-2 text-center">Bedah Digestive (Saluran Cerna)</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="bedahDigestive" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/bedahDigestive.jpg' }}" width="100%"
                                        height="100%" alt="Bedah Digestive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-4 col-md-4 col-lg-2 text-xl-start mb-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#tht" style="font-size: 30px"><i class="fa-solid fa-ear-listen"></i>
                                <p class="fs-1 fs-xxl-2 text-center">THT</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="tht" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/tht.jpg' }}" width="100%" height="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 col-md-4 col-lg-2 text-xl-start mb-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#paru" style="font-size: 30px"><i class="fa-solid fa-lungs"></i>
                                <p class="fs-1 fs-xxl-2 text-center">Paru & TBC</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="paru" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/paru.jpg' }}" width="100%" height="100%"
                                        alt="Paru">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>







                {{-- <div class="col-4 col-md-4 col-lg-2 text-xl-start mb-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#gizi" style="font-size: 30px"><i class="fa-brands fa-nutritionix"></i>
                                <p class="fs-1 fs-xxl-2 text-center">Gizi</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="gizi" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/gizi.jpg' }}" width="100%" height="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="col-4 col-md-4 col-lg-2 text-xl-start mb-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#fisioterapi" style="font-size: 30px"><i
                                    class="fa-solid fa-wheelchair-move"></i>
                                <p class="fs-1 fs-xxl-2 text-center">Rehabilitasi Medik (Fisioterapi dan Terapi Wicara)
                                </p>
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="fisioterapi" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/fisioterapi.jpg' }}" width="100%"
                                        height="100%" alt="Fisioterapi">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 col-md-4 col-lg-2 text-xl-start mb-5">
                    <div class="d-flex flex-column align-items-center">
                        <div class="icon-box text-center">
                            <a class="stretched-link text-decoration-none" role="button" data-bs-toggle="modal"
                                data-bs-target="#hiv" style="font-size: 30px"><i class="fa-solid fa-bacteria"></i>
                                <p class="fs-1 fs-xxl-2 text-center">Klinik Voluntary Counseling and Testing (VCT) / Care
                                    Support and Treatment (CST)</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="hiv" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ 'visitor/assets/img/poli/hiv.jpg' }}" width="100%" height="100%"
                                        alt="HIV">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="py-5">
        <h1 class="text-center pb-5">Tentang Kami</h1>

        <div class="bg-holder bg-size"
            style="background-image: url(/visitor/assets/img/gallery/about-bg.png); background-position: top center; background-size: contain">
        </div>
        <!--/.bg-holder-->

        <div class="p-3">
            <div class="row align-items-center">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 order-lg-1 mb-5 mb-lg-0 text-center">
                    <img class="img-fluid rounded-circle" width="60%"
                        src="{{ asset('visitor/assets/img/gallery/direktur_dr_Vita.png') }}" alt="..." />
                    <div class="text-center">
                        <h4>Plt DIREKTUR</h4>
                        <h5>dr. Novita Elevia Nikijuluw</h5>
                        <!-- <P>NIP 196807222001121001</P> -->
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center text-md-start p-md-6">
                    <h2 class="fw-bold mb-4">Kami Ada Untuk Melayani</h2>
                    <p class="text-justify">
                        RSUD dr. M. Haulussy Ambon sebagai Rumah Sakit Tipe B Pendidikan merupakan rumah sakit rujukan
                        Provinsi Maluku yang merupakan daerah kepulauan terdiri dari 1.388 pulau besar dan kecil.
                        Luas
                        daratan Provinsi Maluku yang hanya 2,44 % dari luas Wilayah 46.158,27 km2 dihuni oleh 1.200.000
                        jiwa.
                        <br>
                        Rumah Sakit hadir di Kota Ambon sejak 13 Maret 1954, luas kota 359,45 Km2 dengan jumlah penduduk sebanyak 384.132 jiwa.
                        <br>
                        <p><i>*Badan Pusat Statistik Maluku 2024.</i></p>
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="pb-0">
        <div class="col-12 py-3">
            <h1 class="text-center">Kepala Ruangan</h1>
        </div>

        <div class="bg-holder bg-size"
            style="background-image: url(/visitor/assets/img/gallery/doctors-bg.png); background-position: top center; background-size: contain">
        </div>
        <!--/.bg-holder-->

        <div class="container">
            <div class="row flex-center">
                <div class="col-xl-10 px-0">
                    <div class="carousel slide" id="carouselExampleDark" data-bs-ride="carousel">
                        <a class="carousel-control-prev carousel-icon z-index-2" href="#carouselExampleDark"
                            role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"
                                aria-hidden="true"></span><span class="visually-hidden">Previous</span></a><a
                            class="carousel-control-next carousel-icon z-index-2" href="#carouselExampleDark"
                            role="button" data-bs-slide="next"><span class="carousel-control-next-icon"
                                aria-hidden="true"></span><span class="visually-hidden">Next</span></a>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <div class="row h-100 m-lg-7 mx-3 mt-6 mx-md-4 my-md-7">
                                    <div class="col-md-4 mb-8 mb-md-0">
                                        <div class="card card-span h-100 shadow">
                                            <div class="card-body d-flex flex-column flex-center py-5">
                                                <img src="{{ asset('visitor/assets/img/kepala_ruangan/igd.png') }}"
                                                    width="230" alt="..." />
                                                <h5 class="mt-3">Martha M. E. T. Pentury, S.Kep</h5>
                                                <p class="mb-0 fs-xxl-1">Manajer IGD</p>
                                                <!-- <p class="text-600 mb-0">Florida, United States</p>
                                                                                                                                                                                                                                                                                                            <p class="text-600 mb-4">10 years experience</p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-8 mb-md-0">
                                        <div class="card card-span h-100 shadow">
                                            <div class="card-body d-flex flex-column flex-center py-5">
                                                <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}"
                                                    width="230" alt="..." />
                                                <h5 class="mt-3">Ns. Magdalena Pattipeilohy, M.Kep</h5>
                                                <p class="mb-0 fs-xxl-1">Manajer IBS</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-8 mb-md-0">
                                        <div class="card card-span h-100 shadow">
                                            <div class="card-body d-flex flex-column flex-center py-5">
                                                <img src="{{ asset('visitor/assets/img/kepala_ruangan/iccu.png') }}"
                                                    width="230" alt="..." />
                                                <h5 class="mt-3">Salianty Riupassa, S.ST</h5>
                                                <p class="mb-0 fs-xxl-1">Manajer ICCU</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="carousel-item" data-bs-interval="2000">
                                <div class="row h-100 m-lg-7 mx-3 mt-6 mx-md-4 my-md-7">
                                    <div class="col-md-4 mb-8 mb-md-0">
                                        <div class="card card-span h-100 shadow">
                                            <div class="card-body d-flex flex-column flex-center py-5">
                                                <img src="{{ asset('visitor/assets/img/kepala_ruangan/icu.png') }}"
                                                    width="230" alt="..." />
                                                <h5 class="mt-3">Ns. Rolita Vien Tuwanakotta, S.Kep</h5>
                                                <p class="mb-0 fs-xxl-1">Manajer ICU</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-8 mb-md-0">
                                        <div class="card card-span h-100 shadow">
                                            <div class="card-body d-flex flex-column flex-center py-5">
                                                <img src="{{ asset('visitor/assets/img/kepala_ruangan/rkk.png') }}"
                                                    width="230" alt="..." />
                                                <h5 class="mt-3">Sandra A. Jacob, S.Kep</h5>
                                                <p class="mb-0 fs-xxl-1">Manajer RKK</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-8 mb-md-0">
                                        <div class="card card-span h-100 shadow">
                                            <div class="card-body d-flex flex-column flex-center py-5">
                                                <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}"
                                                    width="230" alt="..." />
                                                <h5 class="mt-3">Ns. Anat Roosemarie Talubun, S.Kep</h5>
                                                <p class="mb-0 fs-xxl-1">Manajer CENDRAWASIH</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row h-100 m-lg-7 mx-3 mt-6 mx-md-4 my-md-7">
                                    <div class="col-md-4 mb-8 mb-md-0">
                                        <div class="card card-span h-100 shadow">
                                            <div class="card-body d-flex flex-column flex-center py-5">
                                                <img src="{{ asset('visitor/assets/img/kepala_ruangan/nifas.png') }}"
                                                    width="230" alt="..." />
                                                <h5 class="mt-3">Yohana Lakusa, S.ST</h5>
                                                <p class="mb-0 fs-xxl-1">Manajer NIFAS</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-8 mb-md-0">
                                        <div class="card card-span h-100 shadow">
                                            <div class="card-body d-flex flex-column flex-center py-5">
                                                <img src="{{ asset('visitor/assets/img/kepala_ruangan/ginekolgi.png') }}"
                                                    width="230" alt="..." />
                                                <h5 class="mt-3">Christa Metekohy, S.ST</h5>
                                                <p class="mb-0 fs-xxl-1">Manajer GINEKOLOGI</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-8 mb-md-0">
                                        <div class="card card-span h-100 shadow">
                                            <div class="card-body d-flex flex-column flex-center py-5">
                                                <img src="{{ asset('visitor/assets/img/kepala_ruangan/bersalin.png') }}"
                                                    width="230" alt="..." />
                                                <h5 class="mt-3">Antonia Anaktototi, S.ST</h5>
                                                <p class="mb-0 fs-xxl-1">Manajer KAMAR BERSALIN</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="row h-100 m-lg-7 mx-3 mt-6 mx-md-4 my-md-7">
                                    <div class="col-md-4 mb-8 mb-md-0">
                                        <div class="card card-span h-100 shadow">
                                            <div class="card-body d-flex flex-column flex-center py-5">
                                                <img src="{{ asset('visitor/assets/img/kepala_ruangan/nicu.png') }}"
                                                    width="230" alt="..." />
                                                <h5 class="mt-3">Ns. Sherli Latuminase, S.Kep</h5>
                                                <p class="mb-0 fs-xxl-1">Manajer NICU</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-8 mb-md-0">
                                        <div class="card card-span h-100 shadow">
                                            <div class="card-body d-flex flex-column flex-center py-5">
                                                <img src="{{ asset('visitor/assets/img/kepala_ruangan/rpp.png') }}"
                                                    width="230" alt="..." />
                                                <h5 class="mt-3">Ns. Liensya F. Lekatompessy, S.Kep</h5>
                                                <p class="mb-0 fs-xxl-1">Manajer RPP</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-8 mb-md-0">
                                        <div class="card card-span h-100 shadow">
                                            <div class="card-body d-flex flex-column flex-center py-5">
                                                <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}"
                                                    width="230" alt="..." />
                                                <h5 class="mt-3">Ns. Karolina Samloy, S.Kep</h5>
                                                <p class="mb-0 fs-xxl-1">Manajer ISOLASI</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="row h-100 m-lg-7 mx-3 mt-6 mx-md-4 my-md-7">
                                    <div class="col-md-4 mb-8 mb-md-0">
                                        <div class="card card-span h-100 shadow">
                                            <div class="card-body d-flex flex-column flex-center py-5">
                                                <img src="{{ asset('visitor/assets/img/kepala_ruangan/ril.png') }}"
                                                    width="230" alt="..." />
                                                <h5 class="mt-3">Ns. Adriana Kelmakosu, S.Kep</h5>
                                                <p class="mb-0 fs-xxl-1">Manajer RIL (Ruang Interna Laki)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-8 mb-md-0">
                                        <div class="card card-span h-100 shadow">
                                            <div class="card-body d-flex flex-column flex-center py-5">
                                                <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}"
                                                    width="230" alt="..." />
                                                <h5 class="mt-3">Ns. Jacqueline, S.Kep</h5>
                                                <p class="mb-0 fs-xxl-1">Manajer RIW (Ruang Interna Wanita)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-8 mb-md-0">
                                        <div class="card card-span h-100 shadow">
                                            <div class="card-body d-flex flex-column flex-center py-5">
                                                <img src="{{ asset('visitor/assets/img/kepala_ruangan/gabung.png') }}"
                                                    width="230" alt="..." />
                                                <h5 class="mt-3">Ns. Josina Lekatompessy, S.Kep</h5>
                                                <p class="mb-0 fs-xxl-1">Manajer Bedah Gabungan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="row h-100 m-lg-7 mx-3 mt-6 mx-md-4 my-md-7">
                                    <div class="col-md-4 mb-8 mb-md-0">
                                        <div class="card card-span h-100 shadow">
                                            <div class="card-body d-flex flex-column flex-center py-5">
                                                <img src="{{ asset('visitor/assets/img/kepala_ruangan/saraf.png') }}"
                                                    width="230" alt="..." />
                                                <h5 class="mt-3">Ns. Dortje M. Sabono, S.Kep</h5>
                                                <p class="mb-0 fs-xxl-1">Manajer NEUROLOGI</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-8 mb-md-0">
                                        <div class="card card-span h-100 shadow">
                                            <div class="card-body d-flex flex-column flex-center py-5">
                                                <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}"
                                                    width="230" alt="..." />
                                                <h5 class="mt-3">Ns. Henderjeta Benendik, S.Kep</h5>
                                                <p class="mb-0 fs-xxl-1">Manajer HEMODIALISIS</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="py-5">
        <h1 class="text-center mt-8 mb-6">Kritik & Saran</h1>

        <div class="container">
            <div class="row">
                <div class="bg-holder bg-size"
                    style="background-image: url(/visitor/assets/img/gallery/dot-bg.png); background-position: bottom right; background-size: auto">
                </div>

                <div class="col-lg-6 z-index-2 mb-5"><img class="w-100 rounded"
                        src="{{ asset('visitor/assets/img/gallery/info.jpg') }}" alt="..." />
                </div>

                <div class="col-lg-6 z-index-2">
                    <form class="row g-3" id="formKritikSaran">
                        @csrf
                        <div class="col-md-12">
                            <label class="visually-hidden" for="name">Nama</label>
                            <input class="form-control form-livedoc-control" id="name" name="name"
                                type="text" placeholder="Nama" />
                            <span id="nameError" class="error"></span>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label visually-hidden" for="email">Email</label>
                            <input class="form-control form-livedoc-control" id="email" name="email"
                                type="email" placeholder="Email" />
                            <span id="emailError" class="error"></span>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label visually-hidden" for="phone_number">No Handphone</label>
                            <input class="form-control form-livedoc-control" id="phone_number" name="phone_number"
                                type="text" placeholder="No Handphone" />
                            <span id="phoneNumberError" class="error"></span>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label visually-hidden" for="message">Pesan</label>
                            <textarea class="form-control form-livedoc-control" id="message" name="message" style="font-style:italic"
                                maxlength="100" placeholder="Pesan (Maksimum 100 karakter)" style="height: 250px"></textarea>
                            <span id="messageError" class="error"></span>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label visually-hidden" for="hope">Pesan</label>
                            <textarea class="form-control form-livedoc-control" id="hope" name="hope" style="font-style:italic"
                                maxlength="100" placeholder="Harapan (Maksimum 100 karakter)" style="height: 250px"></textarea>
                            <span id="hopeError" class="error"></span>
                        </div>

                        <div class="col-12">
                            <div class="d-grid">
                                <button id="sendSuggestionButton" class="btn btn-primary rounded-pill" type="button"
                                    onclick="sendSuggestion()">Kirim</button>
                            </div>
                        </div>

                        <span id="suggestionError" class="error"></span>
                        <span id="suggestionSuccess" class="success"></span>
                    </form>
                    <div class="mt-4">
                        <h4 class="text-danger mb-2"><b class="">Unit Pengaduan </b></h4>
                        <h4 class="text-black text-stretch">0822 3109 8642</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            $('#gambarModal').modal('show');
            $('.close-btn').click(function() {
                $('#gambarModal').modal('hide');
            });
        });

        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailRegex.test(email)) {
                return false;
            } else {
                return true;
            }
        }

        function validatePhoneNumber(phoneNumber) {
            var phoneRegex = /^(\+62|0)(\d{9,11})$/;
            if (phoneRegex.test(phoneNumber)) {
                return false;
            } else {
                return true;
            }
        }

        function sendSuggestion() {
            $("#nameError").hide();
            $("#emailError").hide();
            $("#phoneNumberError").hide();
            $("#messageError").hide();
            $("#hopeError").hide();
            $("#suggestionError").hide();
            $("#suggestionSuccess").hide();

            $(".error").text("");
            if ($("#name").val() === "") {
                $("#nameError").show();
                $("#nameError").text("Name tidak boleh kosong");
            } else if ($("#name").val().length > 50) {
                $("#nameError").show();
                $("#nameError").text("Name tidak boleh lebih dari 50 karakter");
            } else if ($("#email").val() === "") {
                $("#emailError").show();
                $("#emailError").text("Email tidak boleh kosong");
            } else if (validateEmail($("#email").val())) {
                $("#emailError").show();
                $("#emailError").text("Format email salah");
            } else if ($("#phone_number").val() === "") {
                $("#phoneNumberError").show();
                $("#phoneNumberError").text("Nomor HP tidak boleh kosong");
            } else if (validatePhoneNumber($("#phone_number").val())) {
                $("#phoneNumberError").show();
                $("#phoneNumberError").text("Format nomor HP salah");
            } else if ($("#message").val() === "") {
                $("#messageError").show();
                $("#messageError").text("Pesan tidak boleh kosong");
            } else if ($("#hope").val() === "") {
                $("#hopeError").show();
                $("#hopeError").text("Harapan tidak boleh kosong");
            } else {
                $("#name").prop("disabled", true);
                $("#email").prop("disabled", true);
                $("#phone_number").prop("disabled", true);
                $("#message").prop("disabled", true);
                document.getElementById("sendSuggestionButton").disabled = true;
                $.ajax({
                    type: 'POST',
                    url: '/kritik-saran',
                    data: {
                        name: $("#name").val(),
                        email: $("#email").val(),
                        phone_number: $("#phone_number").val(),
                        message: $("#message").val(),
                        hope: $("#hope").val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            $("#suggestionSuccess").show();
                            $("#suggestionSuccess").text(response.success);
                        }
                    },
                    error: function(xhr, status, error) {
                        $("#suggestionError").show();
                        $("#suggestionError").text(error);
                        $("#name").prop("disabled", false);
                        $("#email").prop("disabled", false);
                        $("#phone_number").prop("disabled", false);
                        $("#message").prop("disabled", false);
                        document.getElementById("sendSuggestionButton").disabled = false;
                    }
                });
            }
        }
    </script>
@endsection
