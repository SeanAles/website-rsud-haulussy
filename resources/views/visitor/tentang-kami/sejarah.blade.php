@extends('visitor.layout.main')

@section('title', 'Sejarah')

@section('content')
    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-5">

        <div class="container">
            <div class="row">
                <div class="col-12 py-3">
                </div>
                <!--/.bg-holder-->
                <h1 class="text-center">RSUD dr. M. Haulussy Ambon</h1>
            </div>
        </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->

    <section>
        <div class="bg-holder bg-size"
            style="background-image:url(visitor/assets/img/gallery/dot-bg.png);background-position:top left;background-size:auto;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/sejarah/sejarah (13).jpg')}}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Tempo Doloe</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">Maret 3, 1954</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">Saat istri inspektur kesehatan Provinsi Maluku.</h5>
                            <a class="stretched-link" role="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">see more</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">RSU Tempo Doloe</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/sejarah/sejarah (13).jpg')}}" width="100%" height="700">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/sejarah/sejarah (1).jpg')}}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Tempo Doloe</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">Maret 11, 1954</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">Menteri kesehatan RI kembali ke Ambon.</h5>
                            <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#example">see
                                more</a>
                        </div>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">RSU Tempo Doloe</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/sejarah/sejarah (1).jpg')}}" width="100%" height="500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/sejarah/sejarah (2).jpg')}}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Tempo Doloe</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">Maret 11, 1954</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">Menteri kesehatan RI yang berdiri di tengah sedang
                                meneliti.</h5>
                            <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#exa">see
                                more</a>
                        </div>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="exa" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">RSU Tempo Doloe</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/sejarah/sejarah (2).jpg')}}" width="100%" height="500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/sejarah/sejarah (3).jpg')}}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Tempo Doloe</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">Maret 3, 1954</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">Direktur RSU Ambon, dr. L. Huiselan menyampaikan
                                pidato.</h5>
                            <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#ex">see
                                more</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="ex" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">RSU Tempo Doloe</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/sejarah/sejarah (3).jpg')}}" width="100%" height="500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/sejarah/sejarah (4).jpg')}}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Tempo Doloe</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">Maret 3, 1954</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">Jalan utama dalam bangunan RSU Ambon di tahun 1954.
                            </h5>
                            <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#e">see
                                more</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="e" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">RSU Tempo Doloe</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/sejarah/sejarah (4).jpg')}}" width="100%" height="500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/sejarah/sejarah (5).jpg')}}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Tempo Doloe</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">Maret 7, 1954</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">Dokter paramedis dan pegawai RSU Ambon di tahun
                                1954.</h5>
                            <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes">see
                                more</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="tes" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">RSU Tempo Doloe</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/sejarah/sejarah (5).jpg')}}" width="100%" height="500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/sejarah/sejarah (6).jpg')}}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Tempo Doloe</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">Maret 11, 1954</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">Pada tanggal 11 maret, para dokter perintis
                                berdirinya RSU.</h5>
                            <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes1">see
                                more</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="tes1" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">RSU Tempo Doloe</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/sejarah/sejarah (6).jpg')}}" width="100%" height="500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/sejarah/sejarah (7).jpg')}}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Tempo Doloe</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">April 23, 1954</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">Pada tanggal 23 april, para dokter sedang berpose
                                untuk berfoto. </h5>
                            <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes2">see
                                more</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="tes2" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">RSU Tempo Doloe</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/sejarah/sejarah (7).jpg')}}" width="100%" height="500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/sejarah/sejarah (8).jpg')}}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Tempo Doloe</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">April 23, 1954</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">Kunjungan Wakil Presiden RI Drs. H. M. Hatta.</h5>
                            <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes3">see
                                more</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="tes3" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">RSU Tempo Doloe</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/sejarah/sejarah (8).jpg')}}" width="100%" height="500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/sejarah/sejarah (9).jpg')}}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Tempo Doloe</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">April 23, 1954</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">Kunjungan wakil Presiden RI Drs. H. M. Hatta.</h5>
                            <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes4">see
                                more</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="tes4" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">RSU Tempo Doloe</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/sejarah/sejarah (9).jpg')}}" width="100%" height="500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/sejarah/sejarah (10).jpg')}}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Tempo Doloe</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">Juli 26, 1955</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">Saat bangunan ruangan induk RSU Ambon belum selesai.
                            </h5>
                            <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes5">see
                                more</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="tes5" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">RSU Tempo Doloe</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/sejarah/sejarah (10).jpg')}}" width="100%" height="500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/sejarah/sejarah (11).jpg')}}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Tempo Doloe</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">Juli 26, 1955</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">Saat bangunan ruangan induk RSU Ambon belum selesai.
                            </h5>
                            <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes6">see
                                more</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="tes6" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">RSU Tempo Doloe</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/sejarah/sejarah (11).jpg')}}" width="100%" height="500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/sejarah/sejarah (12).jpg')}}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Tempo Doloe</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">Maret 3, 1954</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">Gubernur Provinsi Maluku, Mr. J. J Latuharhary.
                            </h5>
                            <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes7">see
                                more</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="tes7" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">RSU Tempo Doloe</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/sejarah/sejarah (12).jpg')}}" width="100%" height="500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/sejarah/sejarah (14).jpg')}}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Tempo Doloe</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">Maret 3, 1954</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">Pembukaan acara peresmian RSU Ambon pada. </h5>
                            <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes8">see
                                more</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="tes8" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">RSU Tempo Doloe</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/sejarah/sejarah (14).jpg')}}" width="100%" height="500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/sejarah/sejarah (15).jpg')}}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Tempo Doloe</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">Maret 3, 1954</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">Inspektur kesehatan Provinsi Maluku, dr. D. P.
                                Tahitu.</h5>
                            <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes9">see
                                more</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="tes9" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">RSU Tempo Doloe</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/sejarah/sejarah (15).jpg')}}" width="100%" height="500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/sejarah/sejarah (16).jpg')}}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Tempo Doloe</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">Maret 3, 1954</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">Kepala jabatan kesehatan tentara Res. Inf.25.</h5>
                            <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes10">see
                                more</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="tes10" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">RSU Tempo Doloe</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/sejarah/sejarah (16).jpg')}}" width="100%" height="500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
