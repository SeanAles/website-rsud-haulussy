@extends('visitor.layout.main')

@section('title', 'Jadwal Poliklinik')

@section('content')
    <section>
        <div class="text-center mb-5">
            <h1>Jadwal Poliklinik</h1>
        </div>

        <div class="container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Klinik</th>
                        <th scope="col">Nama Dokter</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Klinik Penyakit Dalam</td>
                        <td>dr. Susan Timisela, Sp. PD</td>
                        <td>Senin</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>dr. Denny Jolanda, Sp. PD,.FINACIM</td>
                        <td>Selasa</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>Dr. dr. Y Huningkor, Sp. PD,K-KV, FINACIM</td>
                        <td>Rabu</td>
                        <td>08.00 -</td>
                        <td>Pel. Jantung</td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>Dr. dr. Y Huningkor, Sp. PD,K-KV, FINACIM</td>
                        <td>Kamis</td>
                        <td>08.00 -</td>
                        <td>Pel Peny. Dalam</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Klinik Saraf</td>
                        <td>dr. Laura Huwae, Sp. S, M.Kes</td>
                        <td>Senin</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>dr. Enselin Nikijuluw, Sp. S</td>
                        <td>Selasa</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>dr. Enselin Nikijuluw, Sp. S</td>
                        <td>Rabu</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>dr. Yosi Silalahi, Sp. S, M. Kes</td>
                        <td>Kamis</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Klink Bedah</td>
                        <td>dr. Ubaidila , Sp. B, Sub Sp. B. Onk (K)</td>
                        <td>Senin</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>dr. Jeky Tuamely, Sp. B (K)., Trauma FICS. FINACS</td>
                        <td>Selasa</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>dr. Ninoy Mailoa, Sp. B., Sub Sp. BE (K)</td>
                        <td>Rabu</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>dr. Ahmad Tuahuns, Sp. B., FINACS</td>
                        <td>Kamis</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>dr. Ubaidila , Sp. B, Sub Sp. B. Onk (K)</td>
                        <td>Jumat</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>dr. Ninoy Mailoa, Sp. B., Sub Sp. BE (K)</td>
                        <td>Sabtu</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Klinik Gigi</td>
                        <td>drg. Lina Mardiana, M. KG</td>
                        <td>Senin - Jumat</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>drg. Susanna Leuweheri, Sp. KG</td>
                        <td>Senin - Jumat</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>drg. Hasrul Husein, Sp. PM</td>
                        <td>Senin - Jumat</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Klinik Asma</td>
                        <td>dr. Nova , Sp. Paru</td>
                        <td>Senin, Rabu, Jumat</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Klinik Jantung</td>
                        <td>dr. Iman Haryana, Sp. JP., FIHA</td>
                        <td>Selasa, Kamis, Jumat</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>Klinik Obgyn</td>
                        <td>dr. Jenne Pattiasina, Sp. OG</td>
                        <td>Senin</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>dr. Novy Rianti, Sp. OG</td>
                        <td>Selasa</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>dr. Iren Leha, Sp. OG</td>
                        <td>Rabu</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>dr. Uli Maricar, Sp. OG</td>
                        <td>Jumat</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>Klinik Mata</td>
                        <td>dr. Elna Anakotta, Sp. M</td>
                        <td>Senin & Rabu</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">9</th>
                        <td>Klinik Kulit</td>
                        <td>dr. Hanny Tanasal, Sp. KK</td>
                        <td>Senin, Rabu, Jumat</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>dr. Fitri Bandjar, Sp. KK</td>
                        <td>Senin, Kamis, Jumat</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>dr. Rita Sugiono, Sp. KK</td>
                        <td>Selasa, Rabu, Kamis</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">10</th>
                        <td>Klinik Anak</td>
                        <td>dr. Sriwahyuni Djoko, Sp. A</td>
                        <td>Senin</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>dr. Robby Kalew, Sp. A</td>
                        <td>Selasa</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>dr. Vivianty Hartiono, Sp. A</td>
                        <td>Rabu</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>dr. Masayu Polanunu, Sp. A</td>
                        <td>Kamis</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">11</th>
                        <td>Klinik Bedah Digestiv</td>
                        <td>dr. Helfi Nikijuluw, Sp. B-KBD</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">12</th>
                        <td>Klinik Tht</td>
                        <td>dr. Julu Manalu, Sp. THT - KL</td>
                        <td>Senin, rabu, Jumat</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">13</th>
                        <td>Klinik Paru</td>
                        <td>dr. Nova , Sp. Paru</td>
                        <td>Senin, Rabu Jumat</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">14</th>
                        <td>Klinik Fisoterapi</td>
                        <td>dr. Mauren Palijama, Sp. RM</td>
                        <td>Senin, Rabu Jumat</td>
                        <td>08.00 -</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection


