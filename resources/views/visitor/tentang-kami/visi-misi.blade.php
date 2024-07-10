@extends('visitor.layout.main')

@section('title', 'Visi & Misi')

@section('style')
    <style>
        .bold-sub {
            font-weight: 500;
            font-size: 20px;
        }

        .img-responsive {
            width: 90%; /* Default for small screens */
        }

        @media (min-width: 600px) {
            .img-responsive {
                width: 75%; /* Medium screens */
            }
        }

        @media (min-width: 992px) {
            .img-responsive {
                width: 40%; /* Large screens */
            }
        }
    </style>
@endsection

@section('content')
    <div class="text-center">
        <h1>Visi & Misi</h1>
    </div>

    <div class="bg-holder bg-size mb-5"
        style="background-image:url(/visitor/assets/img/gallery/about-bg.png);background-position:top center;background-size:contain;">
    </div>

    <div class="container">
        <div class="mb-5">
            <div class="d-flex justify-content-center">
                <img class="img-responsive" src="{{ asset('visitor/assets/img/visi-misi/Visi dan Misi.jpg') }}" alt="Maklumat dan Janji Pelayanan">
            </div>

            <div class="d-flex justify-content-center mt-5">
                <h1>Maklumat dan Janji Pelayanan</h1>
            </div>
           
            <div class="d-flex justify-content-center">
                <img class="img-responsive" src="{{ asset('visitor/assets/img/visi-misi/Maklumat dan Janji Pelayanan.jpeg') }}" alt="Maklumat dan Janji Pelayanan">
            </div>
        </div>
        
            
    
       
        {{-- <div class="row align-items-center mt-5 p-5 mb-3">
            <h3>Visi dan Misi</h3>
            <img src="{{ asset('visitor/assets/img/visi-misi/Visi dan Misi.jpg') }}" alt="Maklumat dan Janji Pelayanan">
        </div> --}}
    </div>
@endsection
