@extends('visitor.layout.main')

@section('title', 'Visi & Misi')

@section('content')
    <section class="pb-0" id="about">

        <div class="container">
            <div class="row">
                <div class="col-12 py-3">

                </div>
                <!--/.bg-holder-->

                <h1 class="text-center">Visi & Misi</h1>
            </div>
        </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->


    <section class="py-5">
        <div class="bg-holder bg-size"
            style="background-image:url(/visitor/assets/img/gallery/about-bg.png);background-position:top center;background-size:contain;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 order-lg-1 mb-5 mb-lg-0"><img class="fit-cover rounded-circle w-100"
                        src="{{ asset('/visitor/assets/img/gallery/direk.png') }}" alt="..." /></div>
                <div class="col-md-6 text-center text-md-start">
                    <h2 class="fw-bold mb-4">Visi <br class="d-none d-sm-block" /></h2>
                    <p>Melayani dan terjamin dalam kesejahteraan </p>
                    <h2 class="fw-bold mb-4 ">Misi <br class="d-none d-sm-block" /></h2>
                    <p>1. Mewujudkan biokrasi yang dinamis, jujur, bersih, dan melayani.</p>
                    <p>2. Meningkatkan kualitas pendidikan dan kesehatan murah dan terjangkau.</p>
                    <p>3. Mewujudkan sumber daya manusia yang profesional, kreatif, mandiri, dan berprestasi.</p>
                    <div>
                        <h2 class="fw-bold mb-4">Nilai-Nilai luhur <br class="d-none d-sm-block" /></h2>
                        <div class="container">
                            <div class="row">
                                <div class="col-6 col-sm-6">
                                    <div class="row">
                                        <div class="col-2 col-sm-2">
                                            <p><strong>P</strong></p>
                                            <p><strong>E</strong></p>
                                            <p><strong>L</strong></p>
                                            <p><strong>A</strong></p>
                                        </div>
                                        <div class="col-8 col-sm-8">
                                            <p>Profesional</p>
                                            <p>Efisien</p>
                                            <p>Lancar</p>
                                            <p>Aman</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-sm-6">
                                    <div class="row">
                                        <div class="col-2 col-sm-2">
                                            <p><strong>G</strong></p>
                                            <p><strong>A</strong></p>
                                            <p><strong>N</strong></p>
                                            <p><strong>D</strong></p>
                                            <p><strong>O</strong></p>
                                            <p><strong>N</strong></p>
                                            <p><strong>G</strong></p>
                                        </div>
                                        <div class="col-8 col-sm-8">
                                            <p>Giat</p>
                                            <p>Akurat</p>
                                            <p>Nyaman</p>
                                            <p>Disiplin</p>
                                            <p>Optimis</p>
                                            <p>Nurani</p>
                                            <p>Gairah Kerja</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
    </section>
@endsection
