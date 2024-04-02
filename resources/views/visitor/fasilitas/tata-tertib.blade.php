@extends('visitor.layout.main')

@section('title', 'Tata Tertib')

@section('style')
<style>
    .square {
        border: 2px solid #283779;
        /* Border berwarna hitam */
        border-radius: 10px;
        /* Radius border */
        padding: 30px;
    }
</style>
@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Tata Tertib</h1>
    </div>

    <div class="container text-black">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="square">
                    <h4 class="text-black text-center mb-4"><u>Tata Tertib RSUD dr. M. Haulussy Ambon</u></h4>
                    <ol>
                        <li class="mt-1">Menjaga norma susila dan sopan santun.</li>
                        <li class="mt-1">Menjaga dan memelihara kebersihan, keindahan dan ketertiban rumah sakit.</li>
                        <li class="mt-1">Tidak merokok di lingkungan rumah sakit.</li>
                        <li class="mt-1">Tidak membawa anak dibawah umur 12 tahun.</li>
                        <li class="mt-1">Mematuhi jam kunjungan rumah sakit.</li>
                        <ul>
                            <li class="mt-1">Hari kerja dan Hari Libur : Pagi Pukul 09.00 s.d 11.00 Wit, </li>
                            <li class="mt-1">Sore Pukul 17.00 s.d 20.00 Wit. </li>
                        </ul>
                        <li class="mt-1">Penunggu pasien tidak lebih dari 2 (dua) orang.</li>
                        <li class="mt-1">Menggunakan kartu identitas penunggu pasien.</li>
                        <li class="mt-1">Menggunakan tanda pengenal untuk pengunjung pasien.</li>
                        <li class="mt-1">Apabila kartu penunggu atau pengunjung hilang, dikenakan biaya administrasi Rp. 20.000,-.</li>
                        <li class="mt-1">Jika pasien dalam keadaan gawat, pasien boleh ditunggu oleh keluarga pasien dan perawat rohani.</li>
                        <li class="mt-1">Penunggu tidak boleh duduk/berbaring/tidur di tempat tidur pasien.</li>
                        <li class="mt-1">Tidak membawa perhiasan, barang berharga dan uang berlebihan. Jika hilang, pihak rumah sakit tidak bertanggung jawab.</li>
                        <li class="mt-1">Pengunjung tidak boleh berada diruang perawatan bayi/ponek sewaktu pemeriksaan dokter kecuali jika diperlukan sehubungan dengan kondisi kesehatan pasien (gawat).</li>
                        <li class="mt-1">Tidak membawa pulang fasilitas (barang milik) rumah sakit.</li>
                        <li class="mt-1">Tidak mencuci pakaian di ruang perawatan/kamar mandi pasien, kecuali mencuci/menjemur di tempat yang telah disediakan rumah sakit.</li>
                        <li class="mt-1">Tidak mengganggu barang invetaris rumah sakit.</li>
                        <li class="mt-1">Bertanggung jawab atas kerusakan barang/alat inventaris rumah sakit yang ditimbulkan pasien atau pengunggu pasien/keluarga.</li>
                        <li class="mt-1">Ketika pasien pulang/keluar dari ruang perawatan, semua barang inventaris rumah sakit diserahkan kepada petugas.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
