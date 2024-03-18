@extends('visitor.layout.main')

@section('title', 'Mantan Direktur')

@section('content')
    <div class="text-center mb-5">
        <h1>Mantan Direktur</h1>
    </div>

    <div class="bg-holder bg-size"
        style="background-image:url(/visitor/assets/img/gallery/dot-bg.png);background-position:top left;background-size:auto;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                        src="{{ asset('visitor/assets/img/direk/dr. L. Huliselan, ARTS..png') }}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                        <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg><span class="fs--1 text-900">1954 - 1959</span><span class="fs--1"></span>
                        <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. L. Huliselan, ARTS</h5>
                        <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Lihat Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <div class="modal-body">
                                <img src="{{ asset('visitor/assets/img/direk/dr. L. Huliselan, ARTS..png') }}"
                                    style="max-height: 500px; max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                        src="{{ asset('visitor/assets/img/direk/dr. Nn. TAMAELA.png') }}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                        <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg><span class="fs--1 text-900">1959 - 1963</span><span class="fs--1"></span>
                        <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. Nn. Tamaela</h5>
                        <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#example">Lihat Lebih Lanjut</a>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <div class="modal-body">
                                <img src="{{ asset('visitor/assets/img/direk/dr. Nn. TAMAELA.png') }}"
                                    style="max-height: 500px; max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                        src="{{ asset('visitor/assets/img/direk/Direktur.png') }}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                        <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg><span class="fs--1 text-900">Maret 11, 1954</span><span class="fs--1"></span>
                        <h5 class="font-base fs-lg-0 fs-xl-1 my-3">Direktur</h5>
                        <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#exa">Lihat Lebih Lanjut</a>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exa" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <div class="modal-body">
                                <img src="{{ asset('visitor/assets/img/direk/Direktur.png') }}"
                                    style="max-height: 500px; max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                        src="{{ asset('visitor/assets/img/direk/dr. R. SOEBEKTI.png') }}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                        <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                            height="12" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg><span class="fs--1 text-900">1963 - 1968</span><span class="fs--1"></span>
                        <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. R. Soebekti</h5>
                        <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#ex">Lihat Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="ex" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <div class="modal-body">
                                <img src="{{ asset('visitor/assets/img/direk/dr. R. SOEBEKTI.png') }}"
                                    style="max-height: 500px; max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                        src="{{ asset('visitor/assets/img/direk/dr. M. PALIAMA.png') }}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                        <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                            height="12" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg><span class="fs--1 text-900">1970 - 1972</span><span class="fs--1"></span>
                        <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. M. Paliama</h5>
                        <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#e">Lihat Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="e" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <div class="modal-body">
                                <img src="{{ asset('visitor/assets/img/direk/dr. M. PALIAMA.png') }}"
                                    style="max-height: 500px; max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                        src="{{ asset('visitor/assets/img/direk/dr. M. D. KHARIE.png') }}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                        <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                            height="12" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg><span class="fs--1 text-900">1972 - 1975</span><span class="fs--1"></span>
                        <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. M. D. Kharie</h5>
                        <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes">Lihat Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="tes" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <div class="modal-body">
                                <img src="{{ asset('visitor/assets/img/direk/dr. M. D. KHARIE.png') }}"
                                    style="max-height: 500px; max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                        src="{{ asset('visitor/assets/img/direk/dr. D. PALEKAHELU.png') }}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                        <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                            height="12" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg><span class="fs--1 text-900">1975 - 1976</span><span class="fs--1"></span>
                        <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. D. Palekahelu</h5>
                        <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes1">Lihat Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="tes1" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <div class="modal-body">
                                <img src="{{ asset('visitor/assets/img/direk/dr. D. PALEKAHELU.png') }}"
                                    style="max-height: 500px; max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                        src="{{ asset('visitor/assets/img/direk/dr. J. NAHUMURY.png') }}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                        <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                            height="12" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg><span class="fs--1 text-900">1976 - 1983</span><span class="fs--1"></span>
                        <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. J. Nahumury</h5>
                        <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes2">Lihat Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="tes2" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <div class="modal-body">
                                <img src="{{ asset('visitor/assets/img/direk/dr. J. NAHUMURY.png') }}"
                                    style="max-height: 500px; max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                        src="{{ asset('visitor/assets/img/direk/dr. A. F. LOKOLLO, MPH.png') }}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                        <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                            height="12" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg><span class="fs--1 text-900">1983 - 1990</span><span class="fs--1"></span>
                        <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. A. F. Lokollo, MPH</h5>
                        <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes3">Lihat Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="tes3" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <div class="modal-body">
                                <img src="{{ asset('visitor/assets/img/direk/dr. A. F. LOKOLLO, MPH.png') }}"
                                    style="max-height: 500px; max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                        src="{{ asset('visitor/assets/img/direk/dr. A. AFIFUDIN.png') }}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                        <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                            height="12" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg><span class="fs--1 text-900">1990 - 2001</span><span class="fs--1"></span>
                        <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. A. Afifudin</h5>
                        <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes4">Lihat Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="tes4" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <div class="modal-body">
                                <img src="{{ asset('visitor/assets/img/direk/dr. A. AFIFUDIN.png') }}"
                                    style="max-height: 500px; max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                        src="{{ asset('visitor/assets/img/direk/dr. J. MANUPUTTY, MPH.png') }}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                        <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                            height="12" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg><span class="fs--1 text-900">2001 - 2008</span><span class="fs--1"></span>
                        <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. J. Manuputty, MPH</h5>
                        <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes5">Lihat Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="tes5" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <div class="modal-body">
                                <img src="{{ asset('visitor/assets/img/direk/dr. J. MANUPUTTY, MPH.png') }}"
                                    style="max-height: 500px; max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                        src="{{ asset('visitor/assets/img/direk/dr.  Henriette Tanamal, SpKK, MKes.png') }}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                        <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                            height="12" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg><span class="fs--1 text-900">2008</span><span class="fs--1"></span>
                        <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. Henriette Tanamal, Sp.KK, M.Kes.</h5>
                        <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes6">Lihat Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="tes6" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <div class="modal-body">
                                <img src="{{ asset('visitor/assets/img/direk/dr.  Henriette Tanamal, SpKK, MKes.png') }}"
                                    style="max-height: 500px; max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                        src="{{ asset('visitor/assets/img/direk/dr.  F. KOEDOEBOEN. M.Kes.png') }}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                        <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                            height="12" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg><span class="fs--1 text-900">2008</span><span class="fs--1"></span>
                        <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. F. Koedoeboen, M.Kes.</h5>
                        <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes7">Lihat Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="tes7" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <div class="modal-body">
                                <img src="{{ asset('visitor/assets/img/direk/dr.  F. KOEDOEBOEN. M.Kes.png') }}"
                                    style="max-height: 500px; max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                        src="{{ asset('visitor/assets/img/direk/dr. SRI ANANTA WIDHYA, M.kes.png') }}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                        <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                            height="12" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg><span class="fs--1 text-900">2012 - 2014</span><span class="fs--1"></span>
                        <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. Sri Ananta Widhya, M.Kes.</h5>
                        <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes8">Lihat Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="tes8" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <div class="modal-body">
                                <img src="{{ asset('visitor/assets/img/direk/dr. SRI ANANTA WIDHYA, M.kes.png') }}"
                                    style="max-height: 500px; max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                        src="{{ asset('visitor/assets/img/direk/dr. JUSTINI PAWA, M. Kes.png') }}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                        <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                            height="12" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg><span class="fs--1 text-900">2014 - 2022</span><span class="fs--1"></span>
                        <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. Justini Pawa, M.Kes.</h5>
                        <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes9">Lihat Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="tes9" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <div class="modal-body">
                                <img src="{{ asset('visitor/assets/img/direk/dr. JUSTINI PAWA, M. Kes.png') }}"
                                    style="max-height: 500px; max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                        src="{{ asset('visitor/assets/img/direk/dr. Ritha Tahitu, M. Kes..png') }}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                        <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                            height="12" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg><span class="fs--1 text-900">2019 - 2020</span><span class="fs--1"></span>
                        <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. Ritha Tahitu, M. Kes.</h5>
                        <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes001">Lihat Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="tes001" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <div class="modal-body">
                                <img src="{{ asset('visitor/assets/img/direk/dr. Ritha Tahitu, M. Kes..png') }}"
                                    style="max-height: 500px; max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                        src="{{ asset('visitor/assets/img/direk/dr. Rodridgo Limmon, Sp.THT. MARS.png') }}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                        <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                            height="12" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg><span class="fs--1 text-900">2020 - 2021</span><span class="fs--1"></span>
                        <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. Rodridgo Limmon, Sp.THT, MARS</h5>
                        <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes002">Lihat Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="tes002" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <div class="modal-body">
                                <img src="{{ asset('visitor/assets/img/direk/dr. Rodridgo Limmon, Sp.THT. MARS (Fix).png') }}"
                                    style="max-height: 500px; max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                        src="{{ asset('visitor/assets/img/direk/dr. Zulkarnaini MS, Sp.JP, FIHA.png') }}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                        <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                            height="12" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg><span class="fs--1 text-900">2021 - 2022</span><span class="fs--1"></span>
                        <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. Zulkarnaini MS, Sp.JP, FIHA</h5>
                        <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes003">Lihat Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="tes003" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <div class="modal-body">
                                <img src="{{ asset('visitor/assets/img/direk/dr. Zulkarnaini MS, Sp.JP, FIHA.png') }}"
                                    style="max-height: 500px; max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                        src="{{ asset('visitor/assets/img/direk/dr. Nazaruddin, M.Sc..png') }}" alt="news" />
                    <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                        <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                            height="12" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg><span class="fs--1 text-900">2022 - 2023</span><span class="fs--1"></span>
                        <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. Nazaruddin, M.Sc.</h5>
                        <a class="stretched-link" role="button" data-bs-toggle="modal" data-bs-target="#tes004">Lihat Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="tes004" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <div class="modal-body">
                                <img src="{{ asset('visitor/assets/img/direk/dr. Nazaruddin, M.Sc..png') }}"
                                    style="max-height: 500px; max-width: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
