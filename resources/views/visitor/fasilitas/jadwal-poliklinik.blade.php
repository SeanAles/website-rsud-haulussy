@extends('visitor.layout.main')

@section('title', 'Jadwal Poliklinik')

@section('style')
    <style>
        #table {
            z-index: 1;
            background-color: white;
            padding: 0;
        }

        .tb-header {
            background-color: #283779;
            color: white;
        }

        .note {
            font-size: 18px;
        }

        .note-bottom {
            font-size: 18px;
        }
    </style>
@endsection


@section('content')
    <div class="text-center mb-5">
        <h1>Jadwal Poliklinik</h1>
    </div>

    <div class="container" id="table">
        <table class="mb-2">
            <tr>
                <td><p class="note">Mulai Pendaftaran </p></td>
                <td><p class="note">: 08:00 - 11:00.</p></td>
            </tr>
            <tr>
                <td><p class="note">Mulai Pelayanan </p></td>
                <td><p class="note">: 09:00 - 14:00.</p></td>
            </tr>
        </table>
    
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="tb-header">
                    <th scope="col">No</th>
                    <th scope="col">Nama Klinik</th>
                    <th scope="col">Nama Dokter</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Waktu</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Klinik Penyakit Dalam</td>
                    <td>dr. Susan Timisela, Sp.PD</td>
                    <td>Senin</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>dr. Denny Jolanda, Sp.PD, FINASIM</td>
                    <td>Selasa</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>Dr. dr. Y. Huningkor, Sp.PD, K-KV, FINASIM</td>
                    <td>Rabu (Pelayanan Jantung)</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>Dr. dr. Y. Huningkor, Sp.PD, K-KV, FINASIM</td>
                    <td>Kamis</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Klinik Bedah</td>
                    <td>dr. Jacky Tuamelly, Sp. (K) Trauma, FICS, FINACS, FIHFAA</td>
                    <td>Senin & Selasa</td>
                    <td>09.00 - selesai</td>
                </tr>

                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>dr. Ahmad Tuahuns, Sp.B, FINACS</td>
                    <td>Kamis</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>dr. Ninoy Mailoa, Sp.B, Sub Sp.BE (K)</td>
                    <td>Jumat</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Klinik Bedah Vaskular</td>
                    <td>dr. Ninoy Mailoa, Sp.B, Sub Sp.BE (K)</td>
                    <td>Rabu</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Klinik Bedah Digestive</td>
                    <td>dr. Helfi Nikijuluw, Sp.B-KBD</td>
                    <td>Selasa, Rabu, Jumat</td>
                    <td>08:00 - selesai</td>
                </tr>

                <tr>
                    <th scope="row">5</th>
                    <td>Klinik Gigi & Mulut</td>
                    <td>drg. Lina Mardiana, M.KG</td>
                    <td>Senin - Jumat</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>drg. Suzanna Leuhery, Sp.KG</td>
                    <td>Senin - Jumat</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>drg. Hasrul Husain, Sp.PM</td>
                    <td>Senin - Jumat</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>Klinik Asma</td>
                    <td>dr. Marisa Afifudin, Sp.P</td>
                    <td>Senin, Rabu, Jumat</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row">7</th>
                    <td>Klinik Jantung</td>
                    <td>dr. Iman Haryana, Sp.JP., FIHA</td>
                    <td>Selasa, Kamis, Jumat</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>dr. Grace Lilihata, Sp.JP</td>
                    <td>Senin & Rabu</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row">8</th>
                    <td>Klinik Kebidanan-Kandungan & KIA-KB</td>
                    <td>dr. Jeane Pattiasina, Sp.OG</td>
                    <td>Senin</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>dr. Novy Rianti, Sp.OG, M.Kes</td>
                    <td>Selasa</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>dr. Irene Leha, Sp.OG</td>
                    <td>Rabu</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>dr. Uli Maricar, Sp.OG</td>
                    <td>Jumat</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row">9</th>
                    <td>Klinik Mata</td>
                    <td>dr. Elna Anakotta, Sp.M, SH</td>
                    <td>Senin & Rabu</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row">10</th>
                    <td>Klinik Kulit & Kelamin</td>
                    <td>dr. Hanny Tanasal, Sp.KK</td>
                    <td>Senin, Rabu, Jumat</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>Dr. dr. Fitri Bandjar, Sp.KK., M.Kes</td>
                    <td>Senin, Kamis, Jumat</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>dr. Rita Sugiono Tanamal, Sp.KK</td>
                    <td>Selasa, Rabu, Kamis</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row">11</th>
                    <td>Klinik Anak & Imunisasi</td>
                    <td>dr. Sriwahyuni Djoko, Sp.A</td>
                    <td>Senin</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>dr. Robby Kalew, Sp.A</td>
                    <td>Selasa</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>dr. Vivianty Hartiono, Sp.A., MARS</td>
                    <td>Rabu</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>dr. Masayu Polanunu, Sp.A</td>
                    <td>Kamis</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td>Jumat (Imunisasi)</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row">12</th>
                    <td>Klinik Saraf</td>
                    <td>dr. Enseline Nikijuluw, Sp.N</td>
                    <td>Selasa</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>dr. Enseline Nikijuluw, Sp.N</td>
                    <td>Rabu</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>dr. Yosi Silalahi, Sp.S, M. Kes</td>
                    <td>Kamis</td>
                    <td>09.00 - selesai</td>
                </tr>


                <tr>
                    <th scope="row">13</th>
                    <td>Klinik THT</td>
                    <td>dr. Julu Manalu, Sp.THT-KL</td>
                    <td>Senin, Rabu, Jumat</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row">14</th>
                    <td>Klinik Paru & TBC</td>
                    <td>dr. Marisa Afifudin, Sp.P</td>
                    <td>Senin, Rabu Jumat</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row">15</th>
                    <td>Klinik Rehabilitasi Medik (Fisioterapi)</td>
                    <td>dr. Mauren Palijama, Sp.RM</td>
                    <td>Senin, Rabu, Jumat</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row">16</th>
                    <td>Klinik Hemodialisis</td>
                    <td>dr. Siti Hadjar, Sp.D</td>
                    <td>Senin - Sabtu</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row">17</th>
                    <td>Klinik Endoskopi</td>
                    <td>dr. Denny Jolanda, Sp.PD, FINASIM</td>
                    <td>Senin - Jumat</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>dr. Helfi Nikijuluw, Sp.B-KBD</td>
                    <td>Senin - Jumat</td>
                    <td>09.00 - selesai</td>
                </tr>
                <tr>
                    <th scope="row">18</th>
                    <td>Klinik Voluntary Counseling and Testing (VCT) / Care Support and Treatment (CST)</td>
                    <td>dr. Denny Jolanda, Sp.PD, FINASIM</td>
                    <td>Senin & Kamis</td>
                    <td>09:00 - Selesai</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>dr. Sheila Dewanty Christin Maunuputty</td>
                    <td>Senin & Kamis</td>
                    <td>09:00 - Selesai</td>
                </tr>
                <tr>
                    <th scope="row">19</th>
                    <td>MCU (Medical Check Up)</td>
                    <td>dr. Wenny Fonda Liklikwatil</td>
                    <td>Senin - Jumat</td>
                    <td>09:00 - Selesai</td>
                </tr>
            </tbody>
        </table>
        <p class="text-danger note-bottom"><i>*11 September 2024</i></p>
    </div>
@endsection
