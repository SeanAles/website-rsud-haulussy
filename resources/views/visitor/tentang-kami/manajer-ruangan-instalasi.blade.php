@extends('visitor.layout.main')

@section('title', 'Manajer Ruangan & Instalasi')

@section('style')
    <style>
        .custom-card {
            margin-bottom: 20px;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;
            transition: all 0.6s ease;
        }

        .custom-card:hover {
            box-shadow: rgba(150, 204, 223, 0.199) -10px 10px, rgba(150, 204, 223, 0.19) -20px 20px;
        }
    </style>
@endsection
@section('content')
    <section class="container">
        <div class="mb-3">
            <h1 class="text-center">Manajer Ruangan dan Instalasi</h1>
        </div>

        <div class="mt-4">
            <h3 class="mb-3 mt-5">Pejabat Ruang Pelayanan</h3>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="{{ asset('visitor/assets/img/manajer-ruangan-instalasi/ruangan/Ruang IGD.png') }}"
                            class="card-img-top" alt="IGD">
                        <div class="card-body">
                            <h5 class="card-title">IGD</h5>
                            <p class="card-text">Martha M. E. T. Pentury, S.Kep.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="" class="card-img-top" alt="ICCU">
                        <div class="card-body">
                            <h5 class="card-title">ICCU</h5>
                            <p class="card-text">Salianty Riupassa, S.ST.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="{{ asset('visitor/assets/img/manajer-ruangan-instalasi/ruangan/Ruang ICU.png') }}"
                            class="card-img-top" alt="ICU">
                        <div class="card-body">
                            <h5 class="card-title">ICU</h5>
                            <p class="card-text">Ns. Rolita Vien Tuwanakotta, S.Kep.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="{{ asset('visitor/assets/img/manajer-ruangan-instalasi/ruangan/Ruang Kamar Operasi.png') }}"
                            class="card-img-top" alt="Kamar Operasi">
                        <div class="card-body">
                            <h5 class="card-title">Kamar Operasi</h5>
                            <p class="card-text">Ns. Matheus Ngatijan, S.Kep.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="{{ asset('visitor/assets/img/manajer-ruangan-instalasi/ruangan/Ruang Saraf.png') }}"
                            class="card-img-top" alt="Saraf">
                        <div class="card-body">
                            <h5 class="card-title">Saraf</h5>
                            <p class="card-text">Ns. Dortje M. Sabono, S.Kep.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="" class="card-img-top" alt="Bedah Gabung">
                        <div class="card-body">
                            <h5 class="card-title">Bedah Gabung</h5>
                            <p class="card-text">Ns. Josina Lekatompessy, S.Kep.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="" class="card-img-top" alt="Cendrawasih">
                        <div class="card-body">
                            <h5 class="card-title">Cendrawasih</h5>
                            <p class="card-text">Ns. Anat R. Talubun, S.Kep.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="{{ asset('visitor/assets/img/manajer-ruangan-instalasi/ruangan/Ruang RKK-PICU.png') }}"
                            class="card-img-top" alt="RKK-PICU">
                        <div class="card-body">
                            <h5 class="card-title">RKK-PICU</h5>
                            <p class="card-text">Sandra Auqie Jacob, S.Kep. </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="{{ asset('visitor/assets/img/manajer-ruangan-instalasi/ruangan/Ruang Interna Wanita.png') }}"
                            class="card-img-top" alt="Ruang Interna Wanita">
                        <div class="card-body">
                            <h5 class="card-title">Ruang Interna Wanita (RIW)</h5>
                            <p class="card-text">Ns. Jacqueline Latuny, S.Kep.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="{{ asset('visitor/assets/img/manajer-ruangan-instalasi/ruangan/Ruang Interna Laki.png') }}"
                            class="card-img-top" alt="Ruang Interna Laki">
                        <div class="card-body">
                            <h5 class="card-title">Ruang Interna Laki (RIL)</h5>
                            <p class="card-text">Ns. Adriana I. Kelmaskossu, S.Kep.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="" class="card-img-top" alt="TBC-MDR">
                        <div class="card-body">
                            <h5 class="card-title">TBC-MDR</h5>
                            <p class="card-text">Ns. Liensya F. Lekatompessy, S.Kep.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="" class="card-img-top" alt="Nifas">
                        <div class="card-body">
                            <h5 class="card-title">Nifas</h5>
                            <p class="card-text">Yohana W. Lakusa, S.ST.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="{{ asset('visitor/assets/img/manajer-ruangan-instalasi/ruangan/Ruang KB.png') }}"
                            class="card-img-top" alt="Kamar Bersalin">
                        <div class="card-body">
                            <h5 class="card-title">Kamar Bersalin</h5>
                            <p class="card-text">Antonia_Anaktototy, S.ST.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="" class="card-img-top" alt="Ginekologi">
                        <div class="card-body">
                            <h5 class="card-title">Ginekologi</h5>
                            <p class="card-text">Christa Metekohy, S.ST.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="" class="card-img-top" alt="NICU">
                        <div class="card-body">
                            <h5 class="card-title">NICU</h5>
                            <p class="card-text">Ns. Sherli T. Latuminase, S.Kep.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="" class="card-img-top" alt="Paru">
                        <div class="card-body">
                            <h5 class="card-title">Paru</h5>
                            <p class="card-text">Ns. Liensya F. Lekatompessy, S.Kep.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="{{ asset('visitor/assets/img/manajer-ruangan-instalasi/ruangan/Ruang Isolasi.png') }}"
                            class="card-img-top" alt="Isolasi">
                        <div class="card-body">
                            <h5 class="card-title">Isolasi</h5>
                            <p class="card-text">Ns. Karolina Samloy, S.Kep.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="{{ asset('visitor/assets/img/manajer-ruangan-instalasi/ruangan/Ruang Hemodialisis.png') }}"
                            class="card-img-top" alt="Hemodialisis">
                        <div class="card-body">
                            <h5 class="card-title">Hemodialisis</h5>
                            <p class="card-text">Henderjeta Benendik, S.Kep.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="mt-8">
            <h3 class="mb-3 mt-5">Pejabat Instalasi</h3>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="{{ asset('visitor/assets/img/manajer-ruangan-instalasi/instalasi/Instalasi Rekam Medik.png') }}"
                            class="card-img-top" alt="Instalasi Rekam Medik">
                        <div class="card-body">
                            <h5 class="card-title">Instalasi Rekam Medik</h5>
                            <p class="card-text">Glenny L. Syaranamual, Amd.PKStrT.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="" class="card-img-top" alt="Instalasi Gawat Darurat">
                        <div class="card-body">
                            <h5 class="card-title">Instalasi Gawat Darurat</h5>
                            <p class="card-text">dr. Ony Wibriyono Angkejaya, Sp.An., M.Kes.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="" class="card-img-top" alt="Instalasi Rawat Jalan">
                        <div class="card-body">
                            <h5 class="card-title">Instalasi Rawat Jalan</h5>
                            <p class="card-text">dr. Enseline Nikijuluw, Sp.N</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="" class="card-img-top" alt="Instalasi Bedah Sentral">
                        <div class="card-body">
                            <h5 class="card-title">Instalasi Bedah Sentral</h5>
                            <p class="card-text">dr. Jacky Tuamelly, Sp.B</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="{{ asset('visitor/assets/img/manajer-ruangan-instalasi/instalasi/Instalasi Laboratorium.png') }}"
                            class="card-img-top" alt="Instalasi Laboratorium">
                        <div class="card-body">
                            <h5 class="card-title">Instalasi Laboratorium</h5>
                            <p class="card-text">dr. Ingrid A. Hutagalung, M.Kes., Sp.PK</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="" class="card-img-top" alt="Instalasi Radiologi">
                        <div class="card-body">
                            <h5 class="card-title">Instalasi Radiologi</h5>
                            <p class="card-text">dr. Astri Sangadji, Sp.Rad.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="{{ asset('visitor/assets/img/manajer-ruangan-instalasi/instalasi/Instalasi Gizi.png') }}"
                            class="card-img-top" alt="Instalasi Gizi">
                        <div class="card-body">
                            <h5 class="card-title">Instalasi Gizi</h5>
                            <p class="card-text">Paulina Palapessy, Amd.Gz.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="{{ asset('visitor/assets/img/manajer-ruangan-instalasi/instalasi/Instalasi CSSD.png') }}"
                            class="card-img-top" alt="Instalasi CSSD">
                        <div class="card-body">
                            <h5 class="card-title">Instalasi CSSD</h5>
                            <p class="card-text">Ns. Suci Diliyanti, S.Kep.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="" class="card-img-top" alt="Instalasi Farmasi">
                        <div class="card-body">
                            <h5 class="card-title">Instalasi Farmasi</h5>
                            <p class="card-text">Ns. Suci Diliyanti, S.Kep.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="" class="card-img-top" alt="Instalasi Pemulasaran Jenazah">
                        <div class="card-body">
                            <h5 class="card-title">Instalasi Pemulasaran Jenazah</h5>
                            <p class="card-text">dr. Costantius William Sialana, Sp.F, M.Kes.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="" class="card-img-top" alt="Instalasi Rehabilitasi Medik">
                        <div class="card-body">
                            <h5 class="card-title">Instalasi Rehabilitasi Medik</h5>
                            <p class="card-text">dr. Maureen J. Paliyama, Sp.KFR</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="" class="card-img-top" alt="Instalasi Laundry">
                        <div class="card-body">
                            <h5 class="card-title">Instalasi Laundry</h5>
                            <p class="card-text">Margaritha Sipasulta, Amd.Kep.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="" class="card-img-top" alt="Instalasi Sanitasi">
                        <div class="card-body">
                            <h5 class="card-title">Instalasi Sanitasi</h5>
                            <p class="card-text">?</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="" class="card-img-top" alt="IPSRS">
                        <div class="card-body">
                            <h5 class="card-title">IPSRS</h5>
                            <p class="card-text">Markus Samalelaway</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="{{ asset('visitor/assets/img/manajer-ruangan-instalasi/instalasi/Instalasi Promkes.png') }}"
                            class="card-img-top" alt="Instalasi Promkes">
                        <div class="card-body">
                            <h5 class="card-title">Instalasi Promkes</h5>
                            <p class="card-text">Violend H. Wattimury, S.K.M., M.Kes.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card custom-card">
                        <img src="{{ asset('visitor/assets/img/manajer-ruangan-instalasi/instalasi/Instalasi SIMRS & IT.png') }}"
                            class="card-img-top" alt="Instalasi SIMRS & IT">
                        <div class="card-body">
                            <h5 class="card-title">Instalasi SIMRS & IT</h5>
                            <p class="card-text">dr. Semuel A. Wagiu, Sp.S</p>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
@endsection