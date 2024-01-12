@extends('visitor.layout.main')

@section('title', 'Kontak')

@section('style')

@endsection

@section('content')
    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 py-3">
                    <!--/.bg-holder-->

                    <h1 class="text-center">Kritik & Saran</h1>
                </div>
            </div>
        </div>
        <!-- end of .container-->
    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->

    <section class="py-8">
        <div class="container">
            <div class="row">
                <div class="bg-holder bg-size" style="background-image: url(/visitor/assets/img/gallery/dot-bg.png); background-position: bottom right; background-size: auto">
                </div>
                <!--/.bg-holder-->

                <div class="col-lg-6 z-index-2 mb-5"><img class="w-100 rounded" src="{{ asset("visitor/assets/img/gallery/info.jpg") }}" alt="..." />
                </div>
                <div class="col-lg-6 z-index-2">
                    <form class="row g-3">
                        <div class="col-md-12">
                            <label class="visually-hidden" for="inputName">Nama</label>
                            <input class="form-control form-livedoc-control" id="inputName" type="text"
                                placeholder="Nama" />
                        </div>
                        <div class="col-md-12">
                            <label class="form-label visually-hidden" for="inputEmail">Email</label>
                            <input class="form-control form-livedoc-control" id="inputEmail" type="email"
                                placeholder="Email" />
                        </div>

                        <div class="col-md-12">
                            <label class="form-label visually-hidden" for="inputNomorHP">No Handphone</label>
                            <input class="form-control form-livedoc-control" id="inputNomorHP" type="number"
                                placeholder="No Handphone" />
                        </div>


                        <div class="col-md-12">
                            <label class="form-label visually-hidden" for="validationTextarea">Pesan</label>
                            <textarea class="form-control form-livedoc-control" id="validationTextarea" style="font-style:italic" maxlength="100"
                                placeholder="Pesan Maksimum 100 karakter" style="height: 250px" required="required"></textarea>
                        </div>
                        <div class="col-12">
                            <div class="d-grid">
                                <button class="btn btn-primary rounded-pill" type="submit">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
