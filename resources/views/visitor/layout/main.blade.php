<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>@yield('title')</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->

    <link rel="stylesheet" href="{{ asset('visitor/fontawesome/css/all.css') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('visitor/assets/img/favicons/maluku.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('visitor/assets/img/favicons/maluku.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('visitor/assets/img/favicons/maluku.png') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('visitor/assets/img/favicons/maluku.png') }}" />
    <link rel="manifest" href="{{ asset('visitor/assets/img/favicons/manifest.json') }}" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <meta name="msapplication-TileImage" content="{{ asset('visitor/assets/img/favicons/mstile-150x150.png') }}" />
    <meta name="theme-color" content="#ffffff" />

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('visitor/assets/css/theme.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Konten modal -->
                <div class="modal-body text-center">
                    <img src="{{ asset('visitor/assets/img/gallery/hero-bg.png') }}" class="img-fluid"
                        alt="Gambar Modal" />
                </div>
            </div>
        </div>
    </div>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block"
            data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('visitor/assets/img/gallery/rs.png') }}" alt="logo" height="100" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"> </span>
                </button>
                <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tentang Kami
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/sejarah">Sejarah</a>
                                <a class="dropdown-item" href="/mantan-direktur">Mantan Direktur</a>
                                <a class="dropdown-item" href="/visi-misi">Visi & Misi</a>
                                <a class="dropdown-item" href="/struktur-organisasi">Struktur Organisasi</a>
                                <a class="dropdown-item" href="/direksi-manajemen">Direksi & Manajemen</a>
                                <a class="dropdown-item" href="/gambaran-umum">Gambaran Umum</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Fasilitas Pelayanan
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="rawat">Rawat Jalan</a>
                                <a class="dropdown-item" href="#">Jadwal Poliklinik</a>
                                <a class="dropdown-item" href="#">Rawat Inap</a>
                                <a class="dropdown-item" href="#">Alur Pelayanan</a>
                                <a class="dropdown-item" href="#">Pelayanan Penunjang</a>
                                <a class="dropdown-item" href="#">Medical Check Up</a>
                                <a class="dropdown-item" href="#">Ketersediaan tempat tidur</a>
                                <a class="dropdown-item" href="#">Tarif Pelayanan</a>
                                <a class="dropdown-item" href="promkes">Promosi Kesehatan</a>
                                <a class="dropdown-item" href="#">Tata Tertib</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="spesialis">Dokter Spesialis</a>
                                <a class="dropdown-item" href="#">Dokter Umum</a>
                            </div>
                        </li>

                        <li class="nav-item px-2"><a class="nav-link" href="#">Manajer Ruangan & Instalasi</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Informasi
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="sejarah">Berita</a>
                                <a class="dropdown-item" href="direktur">Artikel Kesehatan</a>
                                <a class="dropdown-item" href="visi">Galeri Foto</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Kontak kami
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="kontak">Kontak</a>
                                <a class="dropdown-item" href="#">Survei Kepuasan Pengguna Layanan</a>
                                <a class="dropdown-item" href="#">Kritik & Saran</a>
                            </div>
                        </li>
                    </ul>
                    {{-- <a class="btn btn-sm btn-outline-primary rounded-pill order-1 order-lg-0 ms-lg-4"
                        href="#!">Log In</a> --}}
                </div>
            </div>
        </nav>
        <section class="py-xxl-10 pb-0" id="home">
            <div class="bg-holder bg-size"
                style="background-image: url(visitor/assets/img/gallery/hero-bg.png);background-position: top center;background-size: cover;">
            </div>
            <!--/.bg-holder-->
            <div class="container">
                <div class="row min-vh-xl-100 min-vh-xxl-25">
                    <div class="col-md-5 col-xl-6 col-xxl-7 order-0 order-md-1 text-end">
                        <img class="pt-7 pt-md-0 w-100" src="{{ asset('visitor/assets/img/gallery/hero.png') }}"
                            alt="hero-header" />
                    </div>
                    <div class="col-md-75 col-xl-6 col-xxl-5 text-md-start text-center py-6">
                        <b>
                            <h1 class="fw-light fs-6 fs-xxl-7">
                                RSUD dr. M. Haulussy Ambon
                            </h1>
                        </b>
                        <!-- <p class="fs-1 mb-5">about us</p> -->
                        <a class="btn btn-lg btn-primary rounded-pill"
                            href="https://wa.me/6285311564884?text=Halo,%20saya%20mau%20mendaftar%20online."
                            target="_blank" role="button">Buat Janji Pendaftaran</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="content" class="py-5">
            @yield('content')
        </section>

        <section class="py-0 bg-secondary">
            <div class="bg-holder opacity-25"
                style="background-image: url(visitor/assets/img/gallery/dot-bg.png); background-position: top left; margin-top: -3.125rem; background-size: auto;">
            </div>
            <!--/.bg-holder-->
            <div class="container">
                <div class="row py-8">
                    <div class="col-12 col-sm-12 col-lg-6 mb-4 order-0 order-sm-0">
                        <a class="text-decoration-none" href="#"><img
                                src="{{ asset('visitor/assets/img/gallery/maluku.png') }}" height="51"
                                alt="" /></a>
                        <p class="text-light my-4">RSUD dr. M. Haulussy Ambon</p>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-2 mb-3 order-2 order-sm-1">
                        <h5 class="lh-lg fw-bold mb-4 text-light font-sans-serif">
                            Departments
                        </h5>
                        <ul class="list-unstyled mb-md-4 mb-lg-0">
                            <li class="lh-lg">
                                <a class="footer-link" href="#!">Eye care</a>
                            </li>
                            <li class="lh-lg">
                                <a class="footer-link" href="#!">Cardiac are</a>
                            </li>
                            <li class="lh-lg">
                                <a class="footer-link" href="#!">Heart care</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-2 mb-3 order-3 order-sm-2">
                        <h5 class="lh-lg fw-bold text-light mb-4 font-sans-serif">
                            Membership
                        </h5>
                        <ul class="list-unstyled mb-md-4 mb-lg-0">
                            <li class="lh-lg">
                                <a class="footer-link" href="#!">Free trial</a>
                            </li>
                            <li class="lh-lg">
                                <a class="footer-link" href="#!">Silver</a>
                            </li>
                            <li class="lh-lg">
                                <a class="footer-link" href="#!">Premium</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-2 mb-3 order-3 order-sm-2">
                        <h5 class="lh-lg fw-bold text-light mb-4 font-sans-serif">
                            Customer Care
                        </h5>
                        <ul class="list-unstyled mb-md-4 mb-lg-0">
                            <li class="lh-lg">
                                <a class="footer-link" href="#!">About Us</a>
                            </li>
                            <li class="lh-lg">
                                <a class="footer-link" href="#!">Contact US</a>
                            </li>
                            <li class="lh-lg">
                                <a class="footer-link" href="#!">Get Update</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- ============================================-->
            <!-- <section> begin ============================-->
            <section class="py-0 bg-primary">
                <div class="container">
                    <div class="row justify-content-md-between justify-content-evenly py-4">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-auto text-center text-md-start">
                            <p class="fs--1 my-2 fw-bold text-200">
                                All rights Reserved &copy; RSUD dr. M. Haulussy Ambon, 2023
                            </p>
                        </div>
                        <div class="col-12 col-sm-8 col-md-6">
                            <p class="fs--1 my-2 text-center text-md-end text-200">
                                Made with&nbsp;
                                <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="12"
                                    height="12" fill="#F95C19" viewBox="0 0 16 16">
                                    <path
                                        d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z">
                                    </path>
                                </svg>&nbsp;by&nbsp;
                                <a class="fw-bold text-info" href="https://www.instagram.com/kemi_patty/"
                                    target="_blank">RSUD dr. M. Haulussy Ambon</a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- end of .container-->
            </section>
            <!-- <section> close ============================-->
            <!-- ============================================-->
        </section>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('visitor/vendors/@popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('visitor/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('visitor/vendors/is/is.min.js') }}"></script>

    <script src="{{ asset('visitor/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('visitor/assets/js/theme.js') }}"></script>
    <script src="https://scripts.sirv.com/sirvjs/v3/sirv.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>

    <!-- Sertakan Bootstrap JS, Popper.js, dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script JavaScript untuk menampilkan modal saat halaman dimuat -->
    <!-- <script>
        $(document).ready(function() {
            $("#myModal").modal("show");
        });
    </script> -->

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Fjalla+One&amp;family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100&amp;display=swap"
        rel="stylesheet" />
</body>

</html>
