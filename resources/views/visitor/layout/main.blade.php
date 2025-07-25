<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZYFBJ69P0C"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-ZYFBJ69P0C');
    </script>
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
    <link rel="apple-touch-icon" sizes="150x150" href="{{ asset('visitor/assets/img/favicons/maluku.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('visitor/assets/img/favicons/maluku.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('visitor/assets/img/favicons/maluku.png') }}" />
    <link rel="shortcut icon" type="image/x-icon" sizes="40x40"
        href="{{ asset('visitor/assets/img/favicons/maluku.png') }}" />
    <link rel="manifest" href="{{ asset('visitor/assets/img/favicons/manifest.json') }}" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <meta name="msapplication-TileImage" content="{{ asset('visitor/assets/img/favicons/mstile-150x150.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Fjalla+One&amp;family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100&amp;display=swap"
        rel="stylesheet" />
    <meta name="theme-color" content="#ffffff" />

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('visitor/assets/css/theme.css') }}" rel="stylesheet" />
    @yield('link')
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZYFBJ69P0C"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-ZYFBJ69P0C');
</script>
@yield('style')
<style>
    a#navbarDropdown {
        color: inherit, text-decoration:none;
        color: #1B71A1;
        font-weight: 500;
    }

    a#navbarDropdown:hover {
        text-decoration: none;
        color: #283779;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .nav-item {
            margin-bottom: 20px;
            margin-right: 0px;
        }

        #preloader {
            background: #fff url(/visitor/assets/img/gif/load.gif) no-repeat center center;
            background-size: 15%;
            height: 100vh;
            width: 100%;
            position: fixed;
            z-index: 9999;
        }

        .small-margin {
            margin-top: 50px;
        }
    }


    @media (min-width: 991px) {
        .nav-item {
            margin-bottom: 20px;
            margin-right: 0px;
        }

        #preloader {
            background: #fff url(/visitor/assets/img/gif/load.gif) no-repeat center center;
            background-size: 5%;
            height: 100vh;
            width: 100%;
            position: fixed;
            z-index: 9999;
        }

        .text-main {
            margin-top: 120px;
        }

        .large-top-margin {
            padding-top: 75px;
        }
    }

    .nav-item {
        margin-right: 30px;
    }

    .right-space {
        margin-right: 100px;
    }

    #particles-js {
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: -1;
    }

    .text-center-horizontal {
        text-align: center;
    }

    .whatsapp-button {
        display: inline-flex;
        align-items: center;
    }

    /* new 30jan2025 */
    .notif {
    color: red;
    font-size: 14px;
    font-weight: bold;
    animation: blink 1s infinite;
}

    @keyframes blink {
    50% { opacity: 0; }
    }


</style>

<body>
    <div id="preloader"></div>

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
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="data-navbar-on-scroll">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('visitor/assets/img/gallery/rs.png') }}" alt="logo" style="max-height: 85px" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"> </span>
            </button>
            <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base right-space">
                    <li class="nav-item dropdown">
                        <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tentang Kami
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/profil">Profil</a>
                            <a class="dropdown-item" href="/sejarah">Sejarah</a>
                            <a class="dropdown-item" href="/visi-misi">Visi & Misi</a>
                            <a class="dropdown-item" href="/struktur-organisasi">Struktur Organisasi</a>
                            <a class="dropdown-item" href="/direksi-manajemen">Direksi & Manajemen</a>
                            <a class="dropdown-item" href="/manajer-ruangan-instalasi">Manajer Ruangan & Instalasi</a>
                            {{-- <a class="dropdown-item" href="/gambaran-umum">Gambaran Umum</a> --}}
                            <a class="dropdown-item" href="/mantan-direktur">Mantan Direktur</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Fasilitas Pelayanan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/rawat-jalan">Rawat Jalan</a>
                            <a class="dropdown-item" href="/jadwal-poliklinik">Jadwal Poliklinik</a>
                            {{-- <a class="dropdown-item" href="/rawat-inap">Rawat Inap</a> --}}
                            <a class="dropdown-item" href="/alur-pelayanan">Alur Pelayanan</a>
                            {{-- <a class="dropdown-item" href="/pelayanan-penunjang">Pelayanan Penunjang</a>
                            <a class="dropdown-item" href="/medical-check-up">Medical Check Up</a> --}}
                            <a class="dropdown-item" href="/ketersediaan-tempat-tidur">Ketersediaan Tempat
                                Tidur</a>
                            <a class="dropdown-item" href="/tarif-pelayanan">Tarif Pelayanan <span class="notif">*</span></a>
                            <a class="dropdown-item" href="/promosi-kesehatan">Promosi Kesehatan</a>
                            <a class="dropdown-item" href="/tata-tertib">Tata Tertib</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/dokter-spesialis">Dokter Spesialis</a>
                            <a class="dropdown-item" href="/dokter-umum">Dokter Umum</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Informasi
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/berita">Berita</a>
                            <a class="dropdown-item" href="/artikel">Artikel Kesehatan & Teknologi</a>
                            <a class="dropdown-item" href="/galeri">Galeri Foto</a>
                            <a class="dropdown-item" href="/unduh">Unduh</a>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kontak kami
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/kontak">Kontak</a>
                            <a class="dropdown-item" href="/survei-kepuasaan-masyarakat">Survei Kepuasan Masyarakat</a>
                            <a class="dropdown-item" href="/unit-layanan-pengaduan">Unit Layanan Pengaduan</a>
                            <a class="dropdown-item" href="/kritik-saran">Kritik & Saran</a>
                            <a class="dropdown-item" href="/permintaan-informasi-online">Permintaan Informasi Online</a>
                        </div>
                    </li>
                </ul>

                {{-- <a class="btn btn-sm btn-outline-primary rounded-pill order-1 order-lg-0 ms-lg-4"
                        href="#!">Log In</a> --}}
            </div>
            </div>
        </nav>
        <div id="particles-js"></div>
        <section class="pb-0" id="home">
            <div class="bg-holder bg-size"
                style="background-image: url(/visitor/assets/img/gallery/hero-bg.png);background-position: top center;background-size: cover;">
            </div>
            <!--/.bg-holder-->
            <div class="container text-center pt-3">
                <div class="row min-vh-xl-100 min-vh-xxl-25">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 order-0 order-lg-1">
                        <img class="p-0 img-fluid" width="90%"
                            src="{{ asset('visitor/assets/img/gallery/cover baru.png') }}" alt="hero-header" />
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 text-lg-start text-main large-top-margin">
                        <b>
                            <h1 class="fw-light fs-6 fs-xxl-7">
                                RSUD dr. M. Haulussy Ambon
                            </h1>
                        </b>
                        <!-- <p class="fs-1 mb-5">about us</p> -->
                        <a href="https://wa.me/6281392582755?text=Halo,%20saya%20mau%20mendaftar%20online.">
                            <div class="d-flex-center mt-3">
                                <button class="btn btn-primary rounded-pill whatsapp-button">
                                    <i class="fab fa-whatsapp fa-3x"></i>
                                    <span class="button-text ml-2">Buat Janji Pendaftaran</span>
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="content" class="py-5">
            @yield('content')
        </section>

        <section class="py-0 bg-secondary">
            <div class="bg-holder opacity-25"
                style="background-image: url(/visitor/assets/img/gallery/dot-bg.png); background-position: top left; margin-top: -3.125rem; background-size: auto">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <div class="row pt-5 pb-3">
                    <div class="col-12 col-sm-12 col-lg-3 mb-4 order-0 order-sm-0">
                        <a class="text-decoration-none" href="#"><img
                                src="{{ asset('visitor/assets/img/gallery/maluku.png') }}" height="51"
                                alt="" /></a>
                        <p class="text-light my-4">RSUD dr. M. Haulussy Ambon</p>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-3 mb-3 order-2 order-sm-1">
                        <ul class="list-unstyled mb-md-4 mb-lg-0">
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://rsupleimena.co.id">RSUP dr. J.
                                    Leimena</a></li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://siloamhospitals.com">RS
                                    Siloam</a></li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://rsbhayangkaraambon.com">RS
                                    Bhayangkara Ambon</a></li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://rsusumberhidup.or.id">RS Sumber
                                    Hidup
                                    GPM</a></li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://rskd-maluku.com">RSKD Provinsi
                                    Maluku</a></li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://rstambon.co.id">RS Tk.II Prof. dr. J. A. Latumeten</a>
                            </li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                href="https://rshative.org/">RS Hative</a>
                        </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-3 mb-3 order-3 order-sm-2">
                        <ul class="list-unstyled mb-md-4 mb-lg-0">
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://kemkes.go.id/id/home">Kementerian Kesehatan
                                    </a></li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://satusehat.kemkes.go.id/">Satusehat</a></li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://promkes.kemkes.go.id/">
                                    Promkes Kementerian Kesehatan</a></li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://www.dto.kemkes.go.id/">DTO (Digital Transformation Office)</a></li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://kemendagri.go.id/">Kementerian Dalam Negeri</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-3 mb-3 order-3 order-sm-3">
                        <ul class="list-unstyled mb-md-4 mb-lg-0">
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://malukuprov.go.id">Pemerintah
                                    Provinsi
                                    Maluku</a></li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://dinkes.malukuprov.go.id">Dinas
                                    Kesehatan Provinsi Maluku</a></li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://diskominfo.malukuprov.go.id/">
                                    Dinas Infokom Maluku</a></li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://www.bnpb.go.id/">BNPB</a></li>
                            <li><br></li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://ambon.go.id">Pemerintah Kota
                                    Ambon</a></li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://ambon.go.id/dinas-sosial">Dinas
                                    Sosial Kota Ambon</a></li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://dinkes.ambon.go.id">Dinas
                                    Kesehatan
                                    Kota Ambon </a></li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://fk.unpatti.ac.id">Falkutas
                                    Kedokteran
                                    Unpatti</a></li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://stikesmalukuhusada.ac.id/">STIKES Maluku Husada</a></li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://ukim.ac.id/akademik/fakultas-kesehatan/">Fakultas Keperawatan UKIM</a></li>
                            <li class="lh-lg"><a class="footer-link" target="_blank"
                                    href="https://poltekkes-maluku.ac.id/">Poltekkes Kemenkes Maluku</a></li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="container mb-4">
                <div class="row align-items-center">
                    <div class="col-10 col-sm-10 col-md-6 col-lg-3 col-xl-2 mb-1 order-0 order-sm-0 mt-4">
                        <a target="_blank" href="https://bpjs-kesehatan.go.id/">
                            <img src="{{ asset('visitor/assets/img/kerjasama/BPJS Kesehatan.png') }}"
                                alt="BPJS Kesehatan" width="100%">
                        </a>
                    </div>
                    <div class="col-10 col-sm-10 col-md-6 col-lg-2 col-xl-2 mb-1 order-0 order-sm-0 mt-4">
                        <a target="_blank" href="https://www.bpjsketenagakerjaan.go.id/">
                            <img src="{{ asset('visitor/assets/img/kerjasama/BPJS Ketenagakerjaan.png') }}"
                                alt="BPJS Ketenagakerjaan" width="100%">
                        </a>
                    </div>
                    <div class="col-10 col-sm-10 col-md-6 col-lg-2 col-xl-2 mb-1 order-0 order-sm-0 mt-4">
                        <a target="_blank" href="https://www.inhealth.co.id/">
                            <img src="{{ asset('visitor/assets/img/kerjasama/Mandiri Inhealth.png') }}"
                                alt="Mandiri Inhealth.png" width="80%">
                        </a>
                    </div>
                    <div class="col-10 col-sm-10 col-md-6 col-lg-2 col-xl-3 mb-1 order-0 order-sm-0 mt-4">
                        <a target="_blank" href="https://www.taspen.co.id/">
                            <img src="{{ asset('visitor/assets/img/kerjasama/Taspen.png') }}" alt="Taspen.png"
                                width="80%">
                        </a>
                    </div>
                    <div class="col-10 col-sm-10 col-md-6 col-lg-2 col-xl-2 mb-1 order-0 order-sm-0 mt-4">
                        <a target="_blank" href="https://www.jasaraharja.co.id/">
                            <img src="{{ asset('visitor/assets/img/kerjasama/Jasa Raharja.png') }}"
                                alt="Jasa Raharja.png" width="210px">
                        </a>
                    </div>
                    <div class="col-10 col-sm-10 col-md-6 col-lg-2 col-xl-2 mb-1 order-0 order-sm-0 mt-4">
                        <a target="_blank" href="https://bankmalukumalut.co.id/">
                            <img src="{{ asset('visitor/assets/img/kerjasama/BPD MALUKU.png') }}"
                                alt="logo BPDM.png" width="100%">
                        </a>
                    </div>
                    <!-- <div class="col-10 col-sm-10 col-md-6 col-lg-2 col-xl-2 mb-1 order-0 order-sm-0 mt-4">
                        <a target="_blank" href="https://www.bni.co.id/">
                            <img src="{{ asset('visitor/assets/img/kerjasama/BNI.png') }}"
                                alt="logo bni.png" width="100%">
                        </a>
                    </div> -->
                    <div class="col-10 col-sm-10 col-md-6 col-lg-2 col-xl-2 mb-1 order-0 order-sm-0 mt-4">
                        <a target="_blank" href="https://www.btn.co.id/">
                            <img src="{{ asset('visitor/assets/img/kerjasama/BTN.png') }}"
                                alt="logo BTN.png" width="70%">
                        </a>
                    </div>
                    <!-- <div class="col-10 col-sm-10 col-md-6 col-lg-2 col-xl-2 mb-1 order-0 order-sm-0 mt-4">
                        <a target="_blank" href="https://www.bri.co.id/">
                            <img src="{{ asset('visitor/assets/img/kerjasama/BRI.png') }}"
                                alt="logo bri.png" width="67%">
                        </a>
                    </div> -->
                </div>
            </div>

            <!-- ============================================-->
            <!-- <section> begin ============================-->
            <section class="bg-primary py-0">
                <div class="container">
                    <div class="row justify-content-md-between justify-content-evenly py-4">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-auto text-center text-md-start">
                            <p class="fs--1 my-2 fw-bold text-200">
                                All rights Reserved &copy; RSUD dr. M. Haulussy Ambon, 2024
                            </p>
                        </div>
                        <div class="col-12 col-sm-8 col-md-6">
                            <p class="fs--1 my-2 text-center text-md-end text-200">
                                Made with&nbsp;
                                <svg class="bi bi-suit-heart-fill" xmlns="http://https://w3.org/2000/svg"
                                    width="12" height="12" fill="#F95C19" viewBox="0 0 16 16">
                                    <path
                                        d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z">
                                    </path>
                                </svg>&nbsp;by&nbsp;
                                <a class="fw-bold text-info" href="https://www.instagram.com/rsud.dr.m.haulussy.official/"
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

    <!-- Sertakan Bootstrap JS, Popper.js, dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('visitor/vendors/particles/particles.js') }}"></script>
    <script src="{{ asset('visitor/src/js/app.js') }}"></script>
    <script>
        var loader = document.querySelector("#preloader");

        window.addEventListener("load", function() {
            setTimeout(function() {
                loader.style.display = 'none';
            }, 1000);
        });

        setTimeout(function() {
            console.log("Executed after 1 second");
        }, 1000);
    </script>
    @yield('script')

    <!-- Script JavaScript untuk menampilkan modal saat halaman dimuat -->
     {{-- <script>
        $(document).ready(function() {
            $("#myModal").modal("show");
        });
    </script>  --}}


</body>

</html>
