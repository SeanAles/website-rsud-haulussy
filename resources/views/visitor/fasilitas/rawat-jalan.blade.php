@extends('visitor.layout.main')

@section('title', 'Rawat Jalan')

@section('content')
    <section class="py-5" id="departments">
        <div class="container">
            <div class="row">
                <div class="col-12 py-3">
                    <!--/.bg-holder-->

                    <h1 class="text-center ">Poliklinik</h1>
                </div>
            </div>
        </div>
        <!-- end of .container-->
    </section>


    <section class="py-0">
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
                                <p class="fs-1 fs-xxl-2 text-center">Gigi</p>
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
                                <p class="fs-1 fs-xxl-2 text-center">Kebidanan-Kandungan dan KIA-KB</p>
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
                                data-bs-target="#hemodialisis" style="font-size: 30px"><i class="fa-solid fa-droplet"></i>
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
                                    <img src="{{ 'visitor/assets/img/poli/hemodialisis.jpg' }}" width="100%" height="100%"
                                        alt="Hemodialisis">
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
                                <p class="fs-1 fs-xxl-2 text-center">Kulit</p>
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
                                <p class="fs-1 fs-xxl-2 text-center">Anak dan Imunisasi</p>
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
                                <p class="fs-1 fs-xxl-2 text-center">Paru</p>
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
                                <p class="fs-1 fs-xxl-2 text-center">Rehabilitasi Medik (Fisioterapi)</p>
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
                                <p class="fs-1 fs-xxl-2 text-center">HIV (Pulau Pombo)</p>
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


        </div>

    </section>
@endsection
