@extends('visitor.layout.main')

@section('title', 'Sertifikat Pendidikan Internal')

@section('style')
    <style>
        .download-button {
            color: #283779;
        }

        a:hover {
            color: #00A0C6;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Sertifikat Pendidikan Internal</h1>
    </div>

    <div class="container col-10 col-sm-10 col-md-8 col-lg-6" id="table">
        <table class="table table-bordered table-striped">
            <tr style="color: white; background-color: #283779">
                <th>No.</th>
                <th>Nama File</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Komunikasi Efektif</td>
                <td>
                    <a target="_blank" class="download-button" href="https://drive.google.com/drive/folders/1U0napLcYm-cWx7z9RJxnvU_3epDC5-SG?usp=sharing">Lihat Sertifikat</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pencegahan dan Pengendalian Infeksi (PPI)</td>
                <td>
                    <a target="_blank" class="download-button" href="https://drive.google.com/drive/folders/1XrTLwreBmVI14UdQKQYTFc8riYc1Yy6o?usp=sharing">Lihat Sertifikat</a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Stunting</td>
                <td>
                    <a target="_blank" class="download-button" href="https://drive.google.com/drive/folders/1IwViMUQpKGz7qLIM7cdf6XhRE3j3uMN4?usp=sharing">Lihat Sertifikat</a>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Google Form & SDM IT</td>
                <td>
                    <a target="_blank" class="download-button" href="https://drive.google.com/drive/folders/1pCsWuVxAlXLpX7lO9K4XqkbdQq0gPp5l?usp=sharing">Lihat Sertifikat</a>
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Intervensi Vaskular</td>
                <td>
                    <a target="_blank" class="download-button" href="https://drive.google.com/drive/folders/1LH9fURkzPiWY65thxuVuyWPMe5g5AUHE?usp=sharing">Lihat Sertifikat</a>
                </td>
            </tr>
               
           
        </table>
    </div>
@endsection
