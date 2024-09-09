@extends('visitor.layout.main')

@section('title', 'Promosi Kesehatan')

@section('content')
    <div class="text-center mb-5">
        <h1>Promosi Kesehatan</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
           
            <div class="text-center col-12 col-sm-12 col-md-8 col-lg-4 mt-3">
                <img src="{{ asset('visitor/assets/img/promkes/Promkes Long Banner.jpg') }}" width="100%"
                    alt="Promkes 2"><br>
            </div>
            <div class="text-center col-12 col-sm-12 col-md-8 col-lg-4 m-0 p-0">
                <img src="{{ asset('visitor/assets/img/gallery/qr_code.png') }}" width="80%" alt="Promkes QR"><br>
                <p class="mt-2"><b>https://tiny.one/Edukasi-Haulussy</b></p>
                <a href="https://tiny.one/Edukasi-Haulussy" target="_blank" class="btn btn-info mb-3">Tekan Saya</a>
            </div>
            <div class="text-center col-12 col-sm-12 col-md-8 col-lg-4 mt-3">
                <img src="{{ asset('visitor/assets/img/iklan/Promkes Iklan.jpg') }}" width="100%" alt="Promkes 4"><br>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="text-center mb-2">
            <h1>Artikel Media Luar</h1>
        </div>
        <table class="table table-bordered table-striped">
            <tr style="color: white; background-color: #283779">
                <th>No.</th>
                <th>Judul Artikel</th>
                <th>Aksi</th>
            </tr>
    
            <tr class="text-black">
                <td>1</td>
                <td>Cegah Stroke Dengan Gaya Hidup Sehat</td>
                <td>
                    <a target="_blank" class="download-button" href="https://www.rri.co.id/kesehatan/878979/cegah-stroke-dengan-gaya-hidup-sehat">Lihat Artikel</a>
                </td>
            </tr>
            <tr class="text-black">
                <td>2</td>
                <td>Dokter Spesialis Saraf Jelaskan Penyebab Nyeri Pinggang</td>
                <td>
                    <a target="_blank" class="download-button" href="https://rri.co.id/ambon/kesehatan/885660/dokter-spesialis-saraf-jelaskan-penyebab-nyeri-pinggang">Lihat Artikel</a>
                </td>
            </tr>
            <tr class="text-black">
                <td>3</td>
                <td>Parkinson Dapat Sembuh dengan Tatalaksana Medis yang Tepat</td>
                <td>
                    <a target="_blank" class="download-button" href="https://rri.co.id/ambon/kesehatan/896111/parkinson-dapat-sembuh-dengan-tatalaksana-medis-yang-tepat">Lihat Artikel</a>
                </td>
            </tr>
            <tr class="text-black">
                <td>4</td>
                <td>Kenali Nyeri Kepala Tipe Tegang dan Cara Mengatasinya</td>
                <td>
                    <a target="_blank" class="download-button" href="https://rri.co.id/ambon/kesehatan/903498/kenali-nyeri-kepala-tipe-tegang-dan-cara-mengatasinya">Lihat Artikel</a>
                </td>
            </tr>
            <tr class="text-black">
                <td>5</td>
                <td>Strategi Hidup Bersama Penderita Epilepsi</td>
                <td>
                    <a target="_blank" class="download-button" href="https://rri.co.id/ambon/kesehatan/903482/strategi-hidup-bersama-penderita-epilepsi">Lihat Artikel</a>
                </td>
            </tr>
            <tr class="text-black">
                <td>6</td>
                <td>Kenali Kesemutan Pada Tangan dan Cara Tepat Mengatasinya</td>
                <td>
                    <a target="_blank" class="download-button" href="https://rri.co.id/ambon/kesehatan/908346/kenali-kesemutan-pada-tangan-dan-cara-tepat-mengatasinya">Lihat Artikel</a>
                </td>
            </tr>
            <tr class="text-black">
                <td>7</td>
                <td>Penderita Epilepsi Bisa Menikah dan Punya Keturunan</td>
                <td>
                    <a target="_blank" class="download-button" href="https://rri.co.id/ambon/kesehatan/914040/penderita-epilepsi-bisa-menikah-dan-punya-keturunan">Lihat Artikel</a>
                </td>
            </tr>
            <tr class="text-black">
                <td>8</td>
                <td>Fisioterapi Gangguan Tulang Belakang</td>
                <td>
                    <a target="_blank" class="download-button" href="https://rri.co.id/ambon/kesehatan/921246/fisioterapi-gangguan-tulang-belakang">Lihat Artikel</a>
                </td>
            </tr>
            <tr class="text-black">
                <td>9</td>
                <td>Penyebab Nyeri Kepala Migrain dan Cara Mengobatinya</td>
                <td>
                    <a target="_blank" class="download-button" href="https://rri.co.id/ambon/kesehatan/928798/penyebab-nyeri-kepala-migrain-dan-cara-mengobatinya">Lihat Artikel</a>
                </td>
            </tr>
            <tr class="text-black">
                <td>10</td>
                <td>Mitos dan Fakta Seputar Epilepsi di Indonesia</td>
                <td>
                    <a target="_blank" class="download-button" href="https://rri.co.id/ambon/kesehatan/937356/mitos-dan-fakta-seputar-epilepsi-di-indonesia">Lihat Artikel</a>
                </td>
            </tr>
        </table>
    </div>
@endsection
