@extends('visitor.layout.main')

@section('title', 'Visi & Misi')

@section('style')
    <style>
        .bold-sub {
            font-weight: 500;
            font-size: 20px;
        }

        .img-responsive {
            width: 90%;
            /* Default for small screens */
        }

        @media (min-width: 600px) {
            .img-responsive {
                width: 75%;
                /* Medium screens */
            }
        }

        @media (min-width: 992px) {
            .img-responsive {
                width: 40%;
                /* Large screens */
            }
        }

        .motto-container {
            margin-top: 100px;
            justify-content: center;
            align-items: center;
        }

        .motto-text {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            text-align: center;
            padding: 20px;
            border: 2px solid #333;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            /* Optional: to remove the space between cells */
        }

        th,
        td {
            border: 1px solid black;
            /* Optional: to add borders to the cells */
            padding: 10px;
            /* Change this value to increase/decrease padding */
        }

        .no-border {
            border: none;
        }
    </style>
@endsection

@section('content')

    <div class="text-center">
    <h1>Visi & Misi Pemprov Maluku 2025 - 2030</h1>
    </div>

    <div class="bg-holder bg-size mb-5"
        style="background-image:url(/visitor/assets/img/gallery/about-bg.png);background-position:top center;background-size:contain;">
    </div>

    <div class="container">
        <div class="mb-5">
            <div class="d-flex justify-content-center">
                <img class="img-responsive" src="{{ asset('visitor/assets/img/visi-misi/pemkot.jpg') }}"
                    alt="Maklumat dan Janji Pelayanan">
            </div>

            <div class="d-flex justify-content-center mt-5">
            <h1>Visi & Misi</h1>
            </div>

            <div class="d-flex justify-content-center">
                <img class="img-responsive"
                    src="{{ asset('visitor/assets/img/visi-misi/Visi dan Misi.jpg') }}"
                    alt="Maklumat dan Janji Pelayanan">
            </div>

            <div class="d-flex justify-content-center mt-5">
            <h1>Maklumat dan Janji Pelayanan</h1>
            </div>

            <div class="d-flex justify-content-center">
                <img class="img-responsive"
                    src="{{ asset('visitor/assets/img/visi-misi/Maklumat dan Janji Pelayanan New.jpeg') }}"
                    alt="Maklumat dan Janji Pelayanan">
            </div>
        </div>




        <div class="motto-container">
            <h1 class="text-center mb-2">Motto</h1>
            <div class="motto-text">
                Kami ada untuk melayani
            </div>
        </div>


        <div class="motto-container">
            <h1 class="text-center mb-2">Nilai-nilai Luhur</h1>
            <p class="text-black">Nilai-nilai luhur yang harus diimplementasikan dalam aktivitas kerja para pegawai RS
                disebut "PELA GANDONG"
                yang berupakan singkatan dari nilai-nilai berikut:</p>
            <div class="container table-container d-flex justify-content-center align-items-center ">
                <div class="row">
                    <div class="col-12">
                        <table class="text-black">
                            <tr class="p-5">
                                <th scope="col">P : Profesional</th>
                                <th scope="col">G : Giat</th>
                            </tr>
                            <tr>
                                <th scope="col">E : Efisien</th>
                                <th scope="col">A : Akurat</th>
                            </tr>
                            <tr>
                                <th scope="col">L : Lancar</th>
                                <th scope="col">N : Nyaman</th>
                            </tr>
                            <tr>
                                <th scope="col">A : Aman</th>
                                <th scope="col">D : Disiplin</th>
                            </tr>

                            <tr>
                                <td class="no-border"></td>
                                <th scope="col">O : Optimis</th>

                            </tr>
                            <tr>
                                <td class="no-border"></td>
                                <th scope="col">N : Nurani</th>

                            </tr>
                            <tr>
                                <td class="no-border"></td>
                                <th scope="col">G : Gairah Kerja</th>
                            </tr>


                        </table>
                    </div>
                </div>
            </div>
        </div>



        {{-- <div class="row align-items-center mt-5 p-5 mb-3">
            <h3>Visi dan Misi</h3>
            <img src="{{ asset('visitor/assets/img/visi-misi/Visi dan Misi.jpg') }}" alt="Maklumat dan Janji Pelayanan">
        </div> --}}
    </div>
@endsection
