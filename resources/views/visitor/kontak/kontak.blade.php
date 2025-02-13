@extends('visitor.layout.main')

@section('title', 'Kontak')

@section('style')

@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Kontak</h1>
    </div>

    <div class="bg-holder bg-size"
        style="background-image:url(/visitor/assets/img/gallery/about-bg.png);background-position:top center;background-size:contain;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
        <div class="row align-items-center">
            <div class="text-center">

                <div class="col-12 order-lg-1 mb-5 mb-lg-0">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1004.4382639319804!2d128.16488246954788!3d-3.7085226614697344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d6ce5972c6e30bf%3A0x6e8dfc0e642bad6f!2sRSUD%20Dr.%20M.%20Haulussy!5e1!3m2!1sid!2sid!4v1700018076904!5m2!1sid!2sid"
                        style="width:100%;" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <div class="col-12 mt-3">
                    <h4>
                        Jl. dr. Kayadoe, Kel. Benteng, Kec. Nusaniwe. Ambon 97117, Maluku.
                    </h4>
                </div>

                <div class="mt-5">
                    <a class="m-3" href="https://wa.me/6281392582755?text=Halo,%20saya%20mau%20mendaftar%20online."
                    target="_blank" style="font-size: 50px;"><i class="fa-brands fa-whatsapp"></i></a>
                <a class="m-3" href="https://www.instagram.com/rsud.dr.m.haulussy.official/" target="_blank"
                    style="font-size: 50px;"><i class="fa-brands fa-instagram"></i></a>
                <a class="m-3" href="https://www.facebook.com/rsud.dr.m.haulussy.official" target="_blank"
                    style="font-size: 50px;"><i class="fa-brands fa-facebook"></i></a>
                </div>
            </div>
            <div class="text-center mt-2 mb-5">
                <h4>Email : rs.haulussy.ambon@gmail.com</h4>
            </div>

            <video controls autoplay>
                <!-- Replace "video.mp4" with the actual path to your video file -->
                <source src="{{ asset('visitor/assets/video/RSUD dr. M. Haulussy Ambon.mp4') }}" type="video/mp4">
                <!-- Provide alternative sources for different formats if necessary -->
                <!-- <source src="video.webm" type="video/webm"> -->
                <!-- <source src="video.ogg" type="video/ogg"> -->
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
@endsection
