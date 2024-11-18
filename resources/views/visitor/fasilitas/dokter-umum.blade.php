@extends('visitor.layout.main')

@section('title', 'Dokter Umum')

@section('style')
    <style>
        .accordion {
            margin-bottom: 10px;
            width: 100%;
            cursor: pointer;
            text-align: left;
            border: 1px solid #ddd;
            outline: none;
            transition: 0.4s;
            height: 75px;
        }

        .panel {
            display: none;
            padding: 0 18px;
            background-color: white;
            overflow: hidden;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }

        #doctor-image {
            max-width: 100%;
            max-height: 300px;

        }
    </style>
@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Dokter Umum</h1>
    </div>



    <div class="bg-holder bg-size"
        style="background-image:url(/visitor/assets/img/gallery/about-bg.png);background-position:top center;background-size:contain;">
    </div>
    <!--/.bg-holder-->
    <!-- kiri -->
    <div class="container">
        <p class="text-danger text-right">
            <b>*Diperbarui 18 November 2024</b>
        </p>
        <div class="row justify-content-center">
            <!-- Daftar dokter dengan Bootstrap grid -->
            <div class="col-md-6 col-sm-12 col-12">
                <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drAlvionitaPatandean')">
                    dr. Alvionita Patandean
                </button>
                <div class="panel" id="drAlvionitaPatandean">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Alvionita Patandean"
                        id="doctor-image" />
                </div>

                {{-- <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drEbramNainggolan')">
                    dr. Ebram Nainggolan
                </button> --}}
                <div class="panel" id="drEbramNainggolan">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_laki.png') }}" alt="dr. Ebram Nainggolan"
                        id="doctor-image" />
                </div>

                {{-- <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drFelmiDelima')">
                    dr. Felmi Delima
                </button> --}}
                <div class="panel" id="drFelmiDelima">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Felmi Delima"
                        id="doctor-image" />
                </div>

                <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drFitrahHanafi')">
                    dr. Fitrah Hanafi
                </button>
                <div class="panel" id="drFitrahHanafi">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_laki.png') }}" alt="dr. Fitrah Hanafi"
                        id="doctor-image" />
                </div>

                {{-- <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drFrangkySukwendy')">
                    dr. Frangky Sukwendy
                </button> --}}
                <div class="panel" id="drFrangkySukwendy">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_laki.png') }}" alt="dr. Frangky Sukwendy"
                        id="doctor-image" />
                </div>

                <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drIlineMichaela')">
                    dr. Iline Michaela
                </button>
                <div class="panel" id="drIlineMichaela">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Iline Michaela"
                        id="doctor-image" />
                </div>

                <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drInggridSihasale')">
                    dr. Inggrid Sihasale
                </button>
                <div class="panel" id="drInggridSihasale">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Inggrid Sihasale"
                        id="doctor-image" />
                </div>

                {{-- <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drLeoniAvicaHuningkor')">
                    dr. Leoni Avica Huningkor
                </button> --}}
                <div class="panel" id="drLeoniAvicaHuningkor">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Leoni Avica Huningkor"
                        id="doctor-image" />
                </div>

                <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drMahadianTriEkasari')">
                    dr. Mahadian Tri Ekasari
                </button>
                <div class="panel" id="drMahadianTriEkasari">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Mahadian Tri Ekasari"
                        id="doctor-image" />
                </div>

                {{-- <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drMarischaTitaThiono')">
                    dr. Marischa Tita Thiono
                </button> --}}
                <div class="panel" id="drMarischaTitaThiono">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Marischa Tita Thiono"
                        id="doctor-image" />
                </div>

                {{-- <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drMeigyNitalessy')">
                    dr. Meigy Nitalessy
                </button> --}}
                <div class="panel" id="drMeigyNitalessy">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Meigy Nitalessy"
                        id="doctor-image" />
                </div>

                {{-- <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drNadyaNovitaManalu')">
                    dr. Nadya Novita Manalu
                </button> --}}
                <div class="panel" id="drNadyaNovitaManalu">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Nadya Novita Manalu"
                        id="doctor-image" />
                </div>

                {{-- <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drNazaruddinMSc')">
                    dr. Nazaruddin, M.Sc
                </button> --}}
                <div class="panel" id="drNazaruddinMSc">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Nazaruddin, M.Sc"
                        id="doctor-image" />
                </div>

                <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drNurulHidayah')">
                    dr. Nurul Hidayah

                </button>
                <div class="panel" id="drNurulHidayah">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Nurul Hidayah"
                        id="doctor-image" />
                </div>
            </div>

            <!-- kanan -->
            <div class="col-12 col-sm-12 col-md-6">
                <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drPratamiFririaRieupassa')">
                    dr. Pratami Friria Rieupassa

                </button>
                <div class="panel" id="drPratamiFririaRieupassa">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}"
                        alt="dr. Pratami Friria Rieupassa" id="doctor-image" />
                </div>

                <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drPrillyTheodorus')">
                    dr. Prilly Theodorus

                </button>
                <div class="panel" id="drPrillyTheodorus">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Prilly Theodorus"
                        id="doctor-image" />
                </div>

                <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drPriziliaSaimima')">
                    dr. Prizilia Saimima
                </button>
                <div class="panel" id="drPriziliaSaimima">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Prizilia Saimima"
                        id="doctor-image" />
                </div>

                <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drReynaldoFerdinandus')">
                    dr. Reynaldo Ferdinandus
                </button>
                <div class="panel" id="drReynaldoFerdinandus">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_laki.png') }}" alt="dr. Reynaldo Ferdinandus"
                        id="doctor-image" />
                </div>

                <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drSahranFeggyAPattinama')">
                    dr. Sahran Feggy A. Pattinama
                </button>
                <div class="panel" id="drSahranFeggyAPattinama">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_laki.png') }}"
                        alt="dr. Sahran Feggy A. Pattinama" id="doctor-image" />
                </div>

                <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drSekarIndahSetyarini')">
                    dr. Sekar Indah Setyarini
                </button>
                <div class="panel" id="drSekarIndahSetyarini">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Sekar Indah Setyarini"
                        id="doctor-image" />
                </div>

                {{-- <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drSetiawanWinarso')">
                    dr. Setiawan Winarso
                </button> --}}
                <div class="panel" id="drSetiawanWinarso">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Setiawan Winarso"
                        id="doctor-image" />
                </div>

                <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drSheilaDCManuputty')">
                    dr. Sheila D. C. Manuputty
                </button>
                <div class="panel" id="drSheilaDCManuputty">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Sheila D. C. Manuputty"
                        id="doctor-image" />
                </div>

                {{-- <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drSusiSaptawarni')">
                    dr. Susi Saptawarni
                </button> --}}
                <div class="panel" id="drSusiSaptawarni">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Susi Saptawarni"
                        id="doctor-image" />
                </div>

                <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drVaniaLevinaPolanit')">
                    dr. Vania Levina Polanit
                </button>
                <div class="panel" id="drVaniaLevinaPolanit">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Vania Levina Polanit"
                        id="doctor-image" />
                </div>

                {{-- <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drNovitaEleviaNikijuluw')">
                    dr. Novita Elevia Nikijuluw
                </button> --}}
                <div class="panel" id="drNovitaEleviaNikijuluw">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Novita Elevia Nikijuluw"
                        id="doctor-image" />
                </div>

                <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drWennyFondaLiklikwatil')">
                    dr. Wenny Fonda Liklikwatil
                </button>
                <div class="panel" id="drWennyFondaLiklikwatil">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_cewe.png') }}" alt="dr. Wenny Fonda Liklikwatil"
                        id="doctor-image" />
                </div>

                {{-- <button class="accordion btn btn-primary" onclick="toggleDoctorPanel('drYehielFlaviusKabanga')">
                    dr. Yehiel Flavius Kabanga
                </button> --}}
                <div class="panel" id="drYehielFlaviusKabanga">
                    <img src="{{ asset('visitor/assets/img/avatar/avatar_laki.png') }}" alt="dr. Yehiel Flavius Kabanga"
                        id="doctor-image" />
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@section('script')
    <script>
        // Fungsi untuk menampilkan atau menyembunyikan panel dokter
        function toggleDoctorPanel(doctorId) {
            var panel = document.getElementById(doctorId);
            panel.style.display = panel.style.display === "block" ? "none" : "block";
        }
    </script>
@endsection
