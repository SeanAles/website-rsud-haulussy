@extends('visitor.layout.main')

@section('title', 'Mantan Direktur')

@section('content')
    <section class="py-5" id="departments">
        <div class="container">
            <div class="row">
                <div class="col-12 py-3">
                    <!--/.bg-holder-->

                    <h1 class="text-center ">Mantan Direktur RSUD dr. M. Haulussy Ambon</h1>
                </div>
            </div>
        </div>
        <!-- end of .container-->
    </section>
    <section>
        <div class="bg-holder bg-size"
            style="background-image:url(/visitor/assets/img/gallery/dot-bg.png);background-position:top left;background-size:auto;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/direk/g.png') }}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">1954 - 1959</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. L. Huiselan, ARTS</h5>
                            <a class="stretched-link" role="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">see more</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/direk/g.png') }}" style="max-height: 500px; max-width: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/direk/8.png') }}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">1959 - 1963</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. Nn. Tamaela</h5>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/direk/8.png') }}" style="max-height: 500px; max-width: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/direk/bg.png') }}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">Maret 11, 1954</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">Direktur</h5>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/direk/bg.png') }}" style="max-height: 500px; max-width: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/direk/j.png') }}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">1963 - 1968</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. R. Soebekti</h5>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/direk/j.png') }}" style="max-height: 500px; max-width: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/direk/6.png') }}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">1970 - 1972</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. M. Paliama</h5>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/direk/6.png') }}" style="max-height: 500px; max-width: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/direk/3.png') }}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">1972 - 1975</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. M. D. Kharie</h5>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/direk/3.png') }}" style="max-height: 500px; max-width: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/direk/4.png') }}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">1975 - 1976</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. D. Palekahelu</h5>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/direk/4.png') }}" style="max-height: 500px; max-width: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/direk/2.png') }}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">1976 - 1983</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. J. Nahumury</h5>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/direk/2.png') }}" style="max-height: 500px; max-width: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/direk/1.png') }}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">1983 - 1990</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. A. F. Lokololo, MPH</h5>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/direk/1.png') }}" style="max-height: 500px; max-width: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/direk/15.png') }}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">1990 - 2001</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. A. Afifudin</h5>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/direk/15.png') }}" style="max-height: 500px; max-width: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/direk/14.png') }}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">2001 - 2008</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. J. Manuputty, MPH</h5>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/direk/14.png') }}" style="max-height: 500px; max-width: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/direk/13.png') }}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">2008</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. Henriette Tanamal, SpKK, MKes</h5>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/direk/13.png') }}" style="max-height: 500px; max-width: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/direk/12.png') }}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">2008</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. F. Koedoeboen. M.Kes</h5>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/direk/12.png') }}" style="max-height: 500px; max-width: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/direk/10.png') }}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">2012 - 2014</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. Sri Ananta Widhya, M.kes</h5>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/direk/10.png') }}" style="max-height: 500px; max-width: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                    <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3"
                            src="{{ asset('visitor/assets/img/direk/11.png') }}" alt="news" />
                        <div class="card-body"><span class="fs--1 text-primary me-3">Direktur</span>
                            <svg class="bi bi-calendar2 me-2" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                                </path>
                                <path
                                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                                </path>
                            </svg><span class="fs--1 text-900">2014 - 2022</span><span class="fs--1"></span>
                            <h5 class="font-base fs-lg-0 fs-xl-1 my-3">dr. Justini Pawa, M.Kes</h5>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Direktur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <div class="modal-body">
                                    <img src="{{ asset('visitor/assets/img/direk/11.png') }}" style="max-height: 500px; max-width: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
